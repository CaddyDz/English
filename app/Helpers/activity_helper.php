<?php

/*
 * --------------------------------------------------------------------------
 * Helpers for Activities
 * --------------------------------------------------------------------------
*/

if (!function_exists('activity')) {
    function activity($description)
    {
        return app(English\Services\ActivityService::class)->log($description);
    }
}
