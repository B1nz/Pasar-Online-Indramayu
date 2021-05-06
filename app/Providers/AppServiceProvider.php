<?php

namespace App\Providers;

use App\Models\Toko;
use App\Models\Category;
use App\Observers\TokoObserver;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Blade;
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

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });
    }
}
