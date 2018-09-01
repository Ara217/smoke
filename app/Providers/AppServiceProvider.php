<?php

namespace App\Providers;

use App\Category;
use App\Product;
use App\Region;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        view()->composer('*', function($view) {
            View::share('brands', Product::select(['brand'])->groupBY('brand')->get()->pluck('brand'));
            View::share('category', Category::select(['name'])->groupBY('name')->get()->pluck('name'));
            View::share('region', Region::select(['id', 'name'])->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
