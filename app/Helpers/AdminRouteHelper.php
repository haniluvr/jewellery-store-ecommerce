<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

/**
 * Helper class for environment-aware admin routing.
 */
class AdminRouteHelper
{
    /**
     * Get the environment-aware route name for admin routes.
     *
     * @param string $routeName The route name without the admin prefix
     * @return string The full route name with appropriate prefix
     */
    public static function route(string $routeName): string
    {
        $env = config('app.env');

        if ($env === 'local') {
            // Check the current request to determine the correct prefix
            $httpHost = request()->getHost();

            // Handle admin.localhost with any port
            if ($httpHost === 'admin.localhost' || str_contains($httpHost, 'admin.localhost')) {
                return 'admin.local.'.$routeName;
            }
            // Handle admin.base_domain from config
            elseif ($httpHost === 'admin.'.config('app.base_domain') || str_contains($httpHost, 'admin.'.config('app.base_domain'))) {
                return 'admin.test.'.$routeName;
            }
            // Default fallback for local development
            else {
                return 'admin.local.'.$routeName;
            }
        } else {
            return 'admin.'.$routeName;
        }
    }

    /**
     * Generate a URL for an admin route.
     *
     * @param string $routeName The route name without the admin prefix
     * @param array|object $parameters Route parameters (array or model objects)
     * @return string The generated URL
     */
    public static function url(string $routeName, $parameters = []): string
    {
        $url = route(self::route($routeName), $parameters);

        // Ensure URL uses correct domain based on current request
        $env = config('app.env');
        $currentHost = request()->getHost();
        $currentPort = request()->getPort();
        $currentScheme = request()->getScheme();
        $baseDomain = config('app.base_domain');

        if ($env === 'local') {
            // For local development, ensure URL matches current request domain
            if (str_contains($currentHost, 'admin.localhost')) {
                // Extract the path from the generated URL
                $parsedUrl = parse_url($url);
                $path = $parsedUrl['path'] ?? '/';
                $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
                $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

                // Rebuild URL with current host and port
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';
                $url = $currentScheme.'://admin.localhost'.$port.$path.$query.$fragment;
            } elseif (str_contains($currentHost, 'admin.'.$baseDomain)) {
                // Extract the path from the generated URL
                $parsedUrl = parse_url($url);
                $path = $parsedUrl['path'] ?? '/';
                $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
                $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

                // Rebuild URL with current host and port
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';
                $scheme = ($currentPort == 8443) ? 'https' : $currentScheme;
                $url = $scheme.'://admin.'.$baseDomain.$port.$path.$query.$fragment;
            }
        } elseif ($env === 'production') {
            // For production, ensure URL uses admin domain from config/env
            $parsedUrl = parse_url($url);
            $path = $parsedUrl['path'] ?? '/';
            $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
            $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

            $adminUrl = config('app.admin_url') ?: 'https://admin.'.$baseDomain;
            $url = $adminUrl.$path.$query.$fragment;
        }

        return $url;
    }

    /**
     * Rebuild a URL with the correct domain based on current environment.
     * Useful for fixing stored URLs that need to be updated for the current environment.
     *
     * @param string $url The URL to rebuild
     * @return string The rebuilt URL with correct domain
     */
    public static function rebuildUrl(string $url): string
    {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '/';
        $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
        $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

        $env = config('app.env');
        $currentHost = request()->getHost();
        $currentPort = request()->getPort();
        $currentScheme = request()->getScheme();
        $baseDomain = config('app.base_domain');

        if ($env === 'local') {
            if (str_contains($currentHost, 'admin.localhost')) {
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';

                return $currentScheme.'://admin.localhost'.$port.$path.$query.$fragment;
            } elseif (str_contains($currentHost, 'admin.'.$baseDomain)) {
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';
                $scheme = ($currentPort == 8443) ? 'https' : $currentScheme;

                return $scheme.'://admin.'.$baseDomain.$port.$path.$query.$fragment;
            }
        } elseif ($env === 'production') {
            $adminUrl = config('app.admin_url') ?: 'https://admin.'.$baseDomain;

            return $adminUrl.$path.$query.$fragment;
        }

        // Fallback: return original URL if we can't determine environment
        return $url;
    }

    /**
     * Generate an environment-aware URL for frontend routes.
     * Handles localhost port variations and production domain.
     *
     * @param string $routeName The route name
     * @param array|object $parameters Route parameters
     * @return string The generated URL
     */
    public static function frontendUrl(string $routeName, $parameters = []): string
    {
        $url = route($routeName, $parameters);

        // Ensure URL uses correct domain based on current request
        $env = config('app.env');
        $currentHost = request()->getHost();
        $currentPort = request()->getPort();
        $currentScheme = request()->getScheme();
        $baseDomain = config('app.base_domain');

        if ($env === 'local') {
            // For local development, ensure URL matches current request domain
            if (str_contains($currentHost, 'localhost') && ! str_contains($currentHost, 'admin')) {
                // Extract the path from the generated URL
                $parsedUrl = parse_url($url);
                $path = $parsedUrl['path'] ?? '/';
                $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
                $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

                // Rebuild URL with current host and port
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';
                $url = $currentScheme.'://localhost'.$port.$path.$query.$fragment;
            } elseif (str_contains($currentHost, $baseDomain) && ! str_contains($currentHost, 'admin')) {
                // Extract the path from the generated URL
                $parsedUrl = parse_url($url);
                $path = $parsedUrl['path'] ?? '/';
                $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
                $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

                // Rebuild URL with current host and port
                $port = ($currentPort && $currentPort != 80 && $currentPort != 443) ? ':'.$currentPort : '';
                $scheme = ($currentPort == 8443) ? 'https' : $currentScheme;
                $url = $scheme.'://'.$baseDomain.$port.$path.$query.$fragment;
            }
        } elseif ($env === 'production') {
            // For production, ensure URL uses frontend domain from config/env
            $parsedUrl = parse_url($url);
            $path = $parsedUrl['path'] ?? '/';
            $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
            $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

            $frontendUrl = config('app.frontend_url') ?: 'https://'.$baseDomain;
            $url = $frontendUrl.$path.$query.$fragment;
        }

        return $url;
    }
}

/*
 * Global helper function for admin routes
 *
 * @param  string  $routeName  The route name without the admin prefix
 * @param  array|object  $parameters  Route parameters (array or model objects)
 * @return string The generated URL
 */
if (! function_exists('admin_route')) {
    function admin_route(string $routeName, $parameters = []): string
    {
        return \App\Helpers\AdminRouteHelper::url($routeName, $parameters);
    }
}

/*
 * Global helper function for frontend routes with environment-aware URLs
 *
 * @param  string  $routeName  The route name
 * @param  array|object  $parameters  Route parameters (array or model objects)
 * @return string The generated URL
 */
if (! function_exists('frontend_route')) {
    function frontend_route(string $routeName, $parameters = []): string
    {
        return \App\Helpers\AdminRouteHelper::frontendUrl($routeName, $parameters);
    }
}
