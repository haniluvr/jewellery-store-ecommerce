<?php

/**
 * Global helper functions for the application.
 */
if (! function_exists('admin_route')) {
    /**
     * Generate a URL for an admin route.
     *
     * @param string $routeName The route name without the admin prefix
     * @param array|object $parameters Route parameters (array or model objects)
     * @return string The generated URL
     */
    function admin_route(string $routeName, $parameters = []): string
    {
        // Use RouteHelper for consistent route generation
        // Use class_exists check to ensure the class is available
        if (class_exists(\App\Helpers\RouteHelper::class)) {
            return \App\Helpers\RouteHelper::adminRoute($routeName, $parameters);
        }

        // Fallback: Use the route helper directly if RouteHelper class not found
        $env = config('app.env');
        $prefix = $env === 'local' ? 'admin.test.' : 'admin.';

        return route($prefix.$routeName, $parameters);
    }
}

if (! function_exists('frontend_route')) {
    /**
     * Generate an environment-aware URL for frontend routes.
     *
     * @param string $routeName The route name
     * @param array|object $parameters Route parameters (array or model objects)
     * @return string The generated URL
     */
    function frontend_route(string $routeName, $parameters = []): string
    {
        // Use AdminRouteHelper if available
        if (class_exists(\App\Helpers\AdminRouteHelper::class)) {
            return \App\Helpers\AdminRouteHelper::frontendUrl($routeName, $parameters);
        }

        // Fallback: Use standard route helper
        return route($routeName, $parameters);
    }
}

if (! function_exists('storage_disk')) {
    /**
     * Get the appropriate storage disk based on environment
     * Uses local storage for localhost, S3 for production.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    function storage_disk()
    {
        try {
            // Check for explicit storage disk preference in environment
            $disk = env('FILESYSTEM_DISK');
            if ($disk && $disk !== 'local' && $disk !== 'public') {
                return \Illuminate\Support\Facades\Storage::disk($disk);
            }

            // Fallback to dynamic if available
            if (method_exists(\Illuminate\Support\Facades\Storage::class, 'dynamic')) {
                return \Illuminate\Support\Facades\Storage::dynamic();
            }
        } catch (\Exception $e) {
            // Fallback if issues arise
        }

        // Fallback to public disk
        return \Illuminate\Support\Facades\Storage::disk('public');
    }
}

if (! function_exists('storage_url')) {
    /**
     * Get the appropriate storage URL based on environment
     * Uses local URLs for localhost, S3 URLs for production.
     */
    function storage_url(?string $path): string
    {
        if (! $path) {
            return '';
        }

        // If it's already a full URL, just return it
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        try {
            // Use the centralized dynamic URL generation logic from the Storage macro
            if (method_exists(\Illuminate\Support\Facades\Storage::class, 'getDynamicUrl')) {
                return \Illuminate\Support\Facades\Storage::getDynamicUrl($path);
            }

            // Fallback: Use the dynamic disk's URL generator directly
            $disk = storage_disk();

            return $disk->url($path);
        } catch (\Exception $e) {
            // Silence errors and allow fallback
        }

        // Final fallback: construct local path if all else fails
        return asset('storage/'.ltrim($path, '/'));
    }
}
