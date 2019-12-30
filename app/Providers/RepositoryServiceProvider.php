<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * User repository
         */
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        /*
         * Category repository
         */
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        /*
         * Category Product repository
         */
        $this->app->singleton(
            \App\Repositories\CategoryProduct\CategoryProductRepositoryInterface::class,
            \App\Repositories\CategoryProduct\CategoryProductRepository::class
        );

        /*
         * Product repository
         */
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );


        /*
         * Cart repository
         */
        $this->app->singleton(
            \App\Repositories\Cart\CartRepositoryInterface::class,
            \App\Repositories\Cart\CartRepository::class
        );

    }
}
