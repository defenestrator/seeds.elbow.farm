<?php

namespace Heisen\Providers;

use Heisen\Policies;
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
        'Heisen\Model'          => 'Heisen\Policies\ModelPolicy',
        User::class             => \UserPolicy::class,
        Profile::class          => \ProfilePolicy::class,
        ShippingAddress::class  => \ShippingAddressPolicy::class,
        Invoice::class          => \InvoicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         // Implicitly grant "Admin" role all permissions
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });
    }
}
