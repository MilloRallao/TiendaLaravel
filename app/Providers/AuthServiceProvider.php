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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // the gate checks if the user is an admin
        Gate::define('accessAdminpanel', function($user) {
            return $user->role_id('1');
        });

        // the gate checks if the user is a member
        Gate::define('accessProfile', function($user) {
            return $user->role_id(['2', '3', '4', '5']);
        });
    }
}
