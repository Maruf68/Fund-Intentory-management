<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Pagination\Paginator;
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)

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
<<<<<<< HEAD
        //
=======
        Paginator::useBootstrap();
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)
    }
}
