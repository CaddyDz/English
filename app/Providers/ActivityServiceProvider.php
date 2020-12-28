<?php

namespace English\Providers;

use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Nothing to see here
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        $loader->alias('Activity', \English\Facades\Activity::class);

        $this->app->singleton('ActivityService', function ($app) {
            return app(\English\Services\ActivityService::class);
        });
    }
}
