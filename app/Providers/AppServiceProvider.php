<?php

namespace App\Providers;

use App\Repositories\CategoryProduct\CategoryProductRepository;
use App\Repositories\CategoryProduct\CategoryProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;



class AppServiceProvider extends ServiceProvider
{
    private $catProduct = null;
    public function __construct()
    {
        $this->catProduct = new CategoryProductRepository();
    }



    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        View::share('getCategoryProductViewShare', $this->catProduct->getAll()); // <= Truyền dữ liệu
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

//        $this->app->singleton(
//            UserRepositoryInterface::class,
//            UserRepository::class
//        );
        //$this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

    }


}
