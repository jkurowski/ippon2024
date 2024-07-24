<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('changeLocaleInUrl')) {
    function changeLocaleInUrl($newLocale)
    {
        $currentRouteName = Route::currentRouteName();
        $currentRouteParameters = Route::current()->parameters();

        // Update the locale parameter
        $currentRouteParameters['locale'] = $newLocale;

        // Generate the new URL with the updated locale
        $newUrl = route($currentRouteName, $currentRouteParameters);

        // Preserve query parameters
        $queryParameters = request()->query();
        if (!empty($queryParameters)) {
            $newUrl .= '?' . http_build_query($queryParameters);
        }

        return $newUrl;
    }
}