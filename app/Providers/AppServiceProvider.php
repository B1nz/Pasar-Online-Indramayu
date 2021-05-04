<?php

namespace App\Providers;

use App\Models\Toko;
use App\Models\Category;
use App\Observers\TokoObserver;
use TCG\Voyager\Facades\Voyager;
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
        Voyager::useModel('Category', \App\Models\Category::class);
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
