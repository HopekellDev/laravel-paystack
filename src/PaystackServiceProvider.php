<?php

namespace HopekellDev\Paystack;

use Illuminate\Support\ServiceProvider;

class PaystackServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/paystack.php', 'paystack');

        $this->app->singleton('hopekell-paystack', function () {
            return new Paystack();
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/paystack.php' => config_path('paystack.php'),
        ], 'paystack-config');
    }
}