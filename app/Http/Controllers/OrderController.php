<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Mockery\Exception;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "123";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}


class OrderDao extends Order
{
//    public function getAllOrdersOfUserID($id)
//    {
//        try{
//            $orders = DB::table('order_product')
//                ->leftJoin('products', 'products.id', '=' , 'order_product.product_id')
//                ->leftJoin('orders', 'orders.id', '=' , 'order_product.order_id')
//                ->where('orders.user_id' , '=' , $id)
//                ->get();
//            return $orders;
//        }
//        catch (Exception $ex)
//        {
//            return null;
//        }
//
//    }
}
