<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryProduct\CategoryProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductDao;
use Mockery\Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $product_repository;
    private $product_category_repository;

    public function __construct(ProductRepositoryInterface $pro, CategoryProductRepository $cat)
    {
        $this->product_repository = $pro;
        $this->product_category_repository = $cat;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $newProduct = $this->product_repository->getNewProduct(4);
            $categorysProduct = $this->product_category_repository->getAll();
            return view('front.shop', compact('newProduct', 'categorysProduct'));
        }
        catch (\Exception $e)
        {
            return view('front.shop');
        }
    }

    public function productDetail($name, $id)
    {
        try{
            $product = $this->product_repository->getDetail($id);
            if (isset($product))
            {
                return view('front.product_detail', compact('product'));
            }
            else
            {
                return view('front.404');
            }
        }
        catch (\Exception $e)
        {
            //$errors = $e->getMessage();
            return view('front.404');

        }

    }

    public  function  contact()
    {
        return view('front.contact');
    }
}
