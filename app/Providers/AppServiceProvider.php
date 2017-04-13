<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix for MariaDB : https://laravel-news.com/laravel-5-4-key-too-long-error/
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Gestion\Shop\ICategoryGestion',
            'App\Gestion\Shop\CategoryGestion'
        );
    }
}
