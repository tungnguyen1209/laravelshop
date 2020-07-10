<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use MongoDB\Driver\Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('master', function ($view){
            $product_type = ProductType::all();
            $view->with('product_type', $product_type);
        });
        view()->composer('page.index', function ($view){
            $product_type = ProductType::all();
            $view->with('product_type', $product_type);
        });
    }
}
