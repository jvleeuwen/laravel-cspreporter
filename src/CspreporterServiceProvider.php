<?php

namespace Jvleeuwen\Cspreporter;

use Illuminate\Support\ServiceProvider;

class CspreporterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('cspreporter', function () {
            return new CspreporterService;
        });

        // $this->app->alias('cspreporter', Cspreporter::class);
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
