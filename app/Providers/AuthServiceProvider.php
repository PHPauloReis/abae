<?php

namespace App\Providers;

use App\Customer;
use App\Policies\CustomerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Customer::class => CustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('access-admin', function(User $user) {
            return ($user->access_level === 1 || $user->access_level === 9);
        });

        Gate::define('access-erp', function(User $user) {
            return ($user->access_level === 2 || $user->access_level === 9);
        });
    }
}
