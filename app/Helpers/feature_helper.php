<?php

/*
 * --------------------------------------------------------------------------
 * Helpers for Features
 * --------------------------------------------------------------------------
*/

if (!function_exists('feature')) {
    function feature($key)
    {
        return app(English\Services\FeatureService::class)->isActive($key);
    }
}
