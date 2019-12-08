<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\infomationCheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // su dung xac thuc
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Cart variable
     */
    private $cartDao;

    public function __construct()
    {
        $this->cartDao = new CartDao();
    }

    //
    public function index()
    {
        if (Auth::check())
        {
            /**
             * return view checkout
             */
            $getAllCartItems = $this->cartDao->gettAllItemCart();
            $cartDao = $this->cartDao;
            return view('front.cart.checkOut', compact('getAllCartItems', 'cartDao'));
        }
        else
        {
            /**
             * return view login
             */
            return redirect('login');
        }
    }

    public function addressValidate(infomationCheckoutRequest $request)
    {
        $formInput = $request->all();
        Address::create($formInput);

        // create order
        Order::createOder();
        Cart::destroy();
        Session::flash('suc', 'You succesfully created a post.');
        return redirect()->route('profile.thankyou');
    }
}
