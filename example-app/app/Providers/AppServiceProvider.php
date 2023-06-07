<?php

namespace App\Providers;
use App\Models\Type_Product;
use App\Models\Product;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('header', function ($view) {
            $loai_sp = Type_Product::all();
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('page.loai_sanpham',function ($view) {
            $product_new = Product::where('new',1)->orderBy('id','DESC')->skip(1)->take(8)->get();
            $view->with('product_new', $product_new);
        });
    }
}
