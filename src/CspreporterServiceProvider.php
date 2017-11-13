<?php

namespace Jvleeuwen\Cspreporter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

class CspreporterServiceProvider extends ServiceProvider
{
    // public function boot()
    // {
    //     //
    // }

    public function register()
    {
        // $this->app->singleton('cspreporter.cspreporter', function (Container $app) {
        //     return new Cspreporter();
        // });

        // $this->app->alias('cspreporter.cspreporter', Cspreporter::class);

        $this->app->register('Jvleeuwen\Cspreporter');
        $this->app->alias('Cspreporter', 'Jvleeuwen\Cspreporter/Facades');
    }
}
