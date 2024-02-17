<?php

if (! function_exists('changeLocaleUrl')) {
    function changeLocaleUrl($route, $newLocale)
    {
        // Check if $route is an instance of Illuminate\Routing\Route
        if (!($route instanceof Illuminate\Routing\Route)) {
            throw new InvalidArgumentException('Invalid route provided to changeLocaleUrl function.');
        }

        // Check if route has parameters
        $parameters = $route->parameters();
        if (!is_array($parameters)) {
            throw new InvalidArgumentException('Route parameters not found.');
        }

        // Add or update the locale parameter
        $parameters['locale'] = $newLocale;

        // Get the route name
        $name = $route->getName();
        if (!$name) {
            throw new InvalidArgumentException('Route name not found.');
        }

        // Generate the new URL
        return route($name, $parameters);
    }
}