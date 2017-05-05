<?php

namespace English\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'English\Model' => 'English\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		Gate::define('admin', function ($user) { return ($user->roles->first()->name === 'admin'); });
		Gate::define('team-member', function ($user, $team) { return ($user->teams->find($team->id)); });

        //
    }
}
