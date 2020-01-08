<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Mockery\Exception;

class PrintController extends Controller
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $pro)
    {
        $this->productRepository = $pro;
    }

    public function printProducts()
    {
        try{
            //$products = $this->productRepository->getAllProducts();

            //return view('admin.print.print_product', compact('products'));
            return view('admin.print.test');
        }
        catch (Exception $exception)
        {
            abort('404');
        }
    }
}
