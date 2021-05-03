<?php

namespace App\Providers;

use App\Models\Toko;
use App\Observers\TokoObserver;
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
        Toko::observe(TokoObserver::class);
    }
}
