<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function ($user) {
            return $user->canDo('VIEW_ADMIN');
        });

        Gate::define('ADMIN_USERS', function ($user) {
            return $user->canDo('ADMIN_USERS');
        });

        Gate::define('UPDATE_CATEGORIES', function ($user) {
            return $user->canDo('UPDATE_CATEGORIES');
        });
    }
}
