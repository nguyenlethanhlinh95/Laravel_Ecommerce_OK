<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Mockery\Exception;

class ProfileController extends Controller
{

    //index profile
    public function index()
    {
        return view('front.profile.index');
    }
    // thankyou
    public function thankyou()
    {
        return view('front.profile.thankyou');
    }

    public function orders()
    {
        try {
            $user_id = Auth::user()->id;

            $orders = DB::table('order_product')
                ->leftJoin('products', 'products.id', '=', 'order_product.product_id')
                ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
                ->where('orders.user_id', '=', $user_id)
                ->get();
            return view('front.profile.orders', compact('orders'));
        }
        catch (Exception $ex)
        {

        }

    }

    public function address()
    {
        return view('front.profile.address');
    }
}
