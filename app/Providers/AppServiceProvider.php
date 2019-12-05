<?php

namespace App\Providers;

use App\Http\Controllers\CategoryProductDao;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    private $catProduct = null;
    public function __construct()
    {
        $this->catProduct = new CategoryProductDao();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */



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
        //
    }
}
