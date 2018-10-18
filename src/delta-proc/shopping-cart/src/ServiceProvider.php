<?php

namespace DeltaProc\ShoppingCart;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishes configuration file
        $this->publishes([
            __DIR__.'/../config/shopping-cart.php' => config_path('shopping-cart.php'),
        ], 'shopping-cart config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration files for backwards compatibility
        $this->mergeConfigFrom(
            __DIR__.'/../config/shopping-cart.php',
            'shopping-cart'
        );

        

        // Bind the Cart class to the service container
        // With it's configured driver
        $driver = config('shopping-cart.driver');
        
        $this->app->singleton('DeltaProc\ShoppingCart\Cart', function ($app) use ($driver) {
            return new Cart(new $driver());
        });
    }
}
