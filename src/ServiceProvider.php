<?php

namespace Jvleeuwen\Cspreporter;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
<<<<<<< HEAD
        $this->app->singleton('cspreporter', function () {
                return new Cspreporter($this->app);
            }
=======
        $this->app->singleton(Cspreporter::class, function () {
            $cspreporter = new Cspreporter($this->app);

            return $cspreporter;
        }
>>>>>>> bf72dd0fd71b51e83143b27c494d409febe4730a
        );

        $this->app->alias('cspreporter', Cspreporter::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cspreporter', Cspreporter::class];
    }
}
