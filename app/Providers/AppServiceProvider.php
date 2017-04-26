<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\ClubesAssociados\Repositories\IClubeRepository',
            'App\ClubesAssociados\Repositories\ClubeRepository'
        );

        $this->app->bind(
            'App\ClubesAssociados\Repositories\ISocioRepository',
            'App\ClubesAssociados\Repositories\SocioRepository'
        );
    }
}
