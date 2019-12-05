<?php

namespace App\Http\Controllers;

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
    private $proDao = null;
    private $proCateDao = null;

    public function __construct()
    {
        $this->proDao = new ProductDao();
        $this->proCateDao = new CategoryProductDao();
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
            $newProduct = $this->proDao->getNewProduct();
            $categorysProduct = $this->proCateDao->getAll();
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
            $product = $this->proDao->getDetail($id);
            if (isset($product))
            {
                return view('front.product_detail', ['product'=> $product]);
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
