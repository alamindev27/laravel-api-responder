<?php

namespace Alamindev27\ApiResponder;

use Illuminate\Support\ServiceProvider;

class ApiResponderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('api-responder', function () {
            return new ApiResponder();
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/api-responder.php' => config_path('api-responder.php'),
        ], 'config');
    }
}
