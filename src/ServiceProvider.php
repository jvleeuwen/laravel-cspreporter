<?php

namespace Jvleeuwen\Cspreporter;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Cspreporter::class, function () {
            $cspreporter = new Cspreporter($this->app);

            return $cspreporter;
        }
        );

        $this->app->alias(Cspreporter::class, 'cspreporter');
    }
}
