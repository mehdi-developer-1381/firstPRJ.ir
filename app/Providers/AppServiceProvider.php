<?php

namespace App\Providers;

use App\DesignPatterns\AbstractFactory\DeveloperEX2\BackendDeveloperFactory;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\FrontendDeveloperFactory;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\PositionFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
