<?php

namespace App\Providers;

use App\Helper\Hr;
use Illuminate\Support\ServiceProvider;

class HrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Hr', function () {
            return new Hr();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
