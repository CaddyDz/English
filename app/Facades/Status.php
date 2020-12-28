<?php

namespace English\Facades;

use Illuminate\Support\Facades\Facade;

class Status extends Facade
{
    /**
     * Create the Facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Status';
    }
}
