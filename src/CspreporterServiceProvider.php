<?php

namespace Jvleeuwen\Cspreporter;

use Illuminate\Support\ServiceProvider;

class CspreporterServiceProvider extends ServiceProvider
{

    public function boot(param)
    {
        $this->publishes([__DIR__.'/../config/cspreporter.php' => config_path('cspreporter.php')], 'config');
    }

    public function register()
    {
        $this->app->singleton('cspreporter', function () {
            return new CspreporterService;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cspreporter'];
    }
}
