<?php

namespace Abzudev\LaravelSpaSeo;

use Illuminate\Support\ServiceProvider;

class SpaSeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/spaseo.php' => config_path('spaseo.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/spaseo.php', 'spaseo');
    }
}
