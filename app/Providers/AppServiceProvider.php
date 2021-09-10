<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        if (!file_exists(storage_path('app/public/images'))) {
            mkdir(storage_path('app/public/images'));
        }
        if (!file_exists(storage_path('app/public/pdf'))) {
            mkdir(storage_path('app/public/pdf'));
        }
        if (!file_exists(storage_path('app/public/docs'))) {
            mkdir(storage_path('app/public/docs'));
        }
    }
}
