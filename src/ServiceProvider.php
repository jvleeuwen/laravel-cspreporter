<?php

namespace Jvleeuwen\Cspreporter;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->app->singleton('cspreporter', function () {
                return new Cspreporter($this->app);
            }
=======
=======
>>>>>>> a6b5a6f247a808e33e58de11c46d37f93ec48c80
        $this->app->singleton(Cspreporter::class, function () {
            $cspreporter = new Cspreporter($this->app);

            return $cspreporter;
        }
<<<<<<< HEAD
>>>>>>> bf72dd0fd71b51e83143b27c494d409febe4730a
=======
>>>>>>> a6b5a6f247a808e33e58de11c46d37f93ec48c80
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
