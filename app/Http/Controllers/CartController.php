<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductDao;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cartDao;
    public function __construct()
    {
        $this->cartDao = new CartDao();
    }

    public function index()
    {
        try {
            $boolCart = $this->cartDao->boolCheckCart();
            if ($boolCart > 0) {
                $cartItems = $this->cartDao->gettAllItemCart();
                return view('front.cart.index', ['cartItems' => $cartItems]);
            } else {
                return view('front.cart.empty');
            }

        } catch (Exception $ex) {

        }


    }

    public function addItem($id)
    {
        $boolAddItemCart = $this->cartDao->addCart($id);

        Session::flash('suc', 'You succesfully added a product.');
        return back();
    }

    public function destroy($id)
    {
        $boolDeleteItemCart = $this->cartDao->deleteItemCart($id);
        if ($boolDeleteItemCart)
        {
            Session::flash('inf', 'You succesfully deleted a product.');
            return back();
        }
        else
        {
            Session::flash('err', 'You errors when deleteing a product.');
            return view('404');
        }
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $qty = $input['qty'];
        $rowId = $input['rowId'];

        $boolUpdateItem = $this->cartDao->boolCartUpdateItem($rowId,$qty);

        if ($boolUpdateItem)
        {
            $cartItem = $this->cartDao->getCartItem($rowId);
            $total = $this->cartDao->getTotal();
            $tax = $this->cartDao->getTax();
            $subtotal = $this->cartDao->getSubTotal();

            return response()->json(['data'=>$cartItem, 'total'=> $total, 'tax'=>$tax, 'subtotal' => $subtotal], 200);
        }
        else
        {
            Session::flash('err', 'You can\'t update this product.');
            return back();
        }
    }

}


class CartDao
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductDao();
    }

    public function addCart($id)
    {
        try{
            $product = $this->product->getDetail($id);
            Cart::add($id, $product->pro_name, 1, $product->pro_price, ['img' => $product->image]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }

    public function gettAllItemCart()
    {
        return Cart::content();
    }

    public function boolCheckCart()
    {
        if (Cart::count()>0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteItemCart($id)
    {
        try
        {
            Cart::remove($id);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function boolCartUpdateItem($rowId, $qty)
    {
        try{
            Cart::update($rowId, $qty);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function getCartItem($id)
    {
        try
        {
            return Cart::get($id);
        }
        catch (Exception $ex)
        {

        }

    }

    public function getSubTotal()
    {
        try{
            return Cart::subtotal();

        }
        catch (Exception $ex)
        {

        }
    }

    public function getTax()
    {
        try{
            return Cart::tax();
        }
        catch (Exception $ex)
        {

        }
    }

    public function getTotal()
    {
        try{
            return Cart::total();
        }
        catch (Exception $ex)
        {

        }
    }
}
