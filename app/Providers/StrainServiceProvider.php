<?php

namespace Heisen\Providers;

use Illuminate\Support\ServiceProvider;

class StrainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return StrainQuery
     */
    public function register()
    {
        $this->app->singleton(Strain::class, function(){
            return new StrainQuery;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
