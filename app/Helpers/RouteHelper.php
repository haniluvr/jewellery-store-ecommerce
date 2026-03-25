<?php

namespace App\Helpers;

class RouteHelper
{
    /**
     * Get the correct admin route name based on environment.
     */
    public static function adminRoute(string $routeName, $parameters = []): string
    {
        $env = config('app.env');
        $httpHost = request()->server->get('HTTP_HOST');
        $host = request()->getHost();
        $port = request()->getPort();
        $scheme = request()->getScheme();

        $baseDomain = config('app.base_domain');

        // Determine the correct prefix based on environment and domain
        if ($env === 'local') {
            // For local development, check domain to determine prefix
            if (str_contains($httpHost, 'admin.'.$baseDomain)) {
                $prefix = 'admin.test.';
            } elseif (str_contains($httpHost, 'admin.localhost')) {
                $prefix = 'admin.local.';
            } else {
                $prefix = 'admin.test.'; // Default for local
            }
        } else {
            // For production, use standard admin prefix
            $prefix = 'admin.';
        }

        $url = route($prefix.$routeName, $parameters);

        // Fix URL scheme and port for specific environments
        if ($env === 'local') {
            // Reconstruct URL with current request's scheme, host, and port
            $domain = $host === 'localhost' || $host === '127.0.0.1' ? 'localhost:8080' : ($host === 'eclorejewellery.shop' ? 'eclorejewellery.shop:8080' : 'eclorejewellery.shop');
            $portString = (($scheme === 'https' && $port === 443) || ($scheme === 'http' && $port === 80)) ? '' : ':'.$port;
            $parsedUrl = parse_url($url);
            $path = $parsedUrl['path'] ?? '/';
            $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
            $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

            $url = $scheme.'://'.$host.$portString.$path.$query.$fragment;
        } elseif ($env === 'production') {
            // Use production domain from config if available
            $frontendUrl = config('app.frontend_url');
            if ($frontendUrl) {
                $parsedUrl = parse_url($url);
                $path = $parsedUrl['path'] ?? '/';
                $query = isset($parsedUrl['query']) ? '?'.$parsedUrl['query'] : '';
                $fragment = isset($parsedUrl['fragment']) ? '#'.$parsedUrl['fragment'] : '';

                // If the route generated was an admin route, use admin_url
                if (str_contains($url, 'admin.')) {
                    $adminUrl = config('app.admin_url') ?: 'https://admin.'.config('app.base_domain');
                    $url = $adminUrl.$path.$query.$fragment;
                } else {
                    $url = $frontendUrl.$path.$query.$fragment;
                }
            }
        }

        return $url;
    }

    /**
     * Get the correct route name for any route based on environment.
     */
    public static function getRoute(string $routeName): string
    {
        $env = config('app.env');

        if ($env === 'local') {
            // For local development, check if it's an admin route
            if (str_starts_with($routeName, 'admin.')) {
                return str_replace('admin.', 'admin.test.', $routeName);
            }
        }

        return $routeName;
    }
}
