<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Engines\NunjucksEngine;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::addExtension('njk', 'nunjucks', function () {
            return new NunjucksEngine($this->app['files']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
