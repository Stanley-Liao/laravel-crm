<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libraries\Horoscope;
class HoroscopeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind('App\Interfaces\Ihoroscope', function($app){
            return new Horoscope();   
        });
    }
}
