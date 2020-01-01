<?php

namespace App\Providers;

use App\Repositories\CategoryProduct\CategoryProductRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    private $catProduct = null;
    private $product = null;
    //private $count_wishlist = 0;
    public function __construct()
    {
        $this->catProduct = new CategoryProductRepository();
        $this->product = new ProductRepository();

    }

    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        View::share('getCategoryProductViewShare', $this->catProduct->getAll()); // <= Truyền dữ liệu

        view()->composer('layout/partials/topMenu', function($view){
            if (Auth::check()){
                $user_id = Auth::user()->id;
                $count_wishlist = $this->product->countWishlist($user_id);
                $view->with('count_wishlist', $count_wishlist);
            }

        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }


}
