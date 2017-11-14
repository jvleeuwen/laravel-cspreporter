<?php

namespace Jvleeuwen\Cspreporter;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->singleton('cspreporter', function () {
            return new Cspreporter($this->app);
<<<<<<< HEAD
        });
=======
        }
        );
>>>>>>> develop

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
