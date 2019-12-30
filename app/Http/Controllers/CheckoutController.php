<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\infomationCheckoutRequest;
use App\Repositories\Cart\CartRepositoryInterface;
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
    private $cart_repository;

    public function __construct(CartRepositoryInterface $cart_repo)
    {
        $this->cart_repository = $cart_repo;
    }

    //
    public function index()
    {
        if (Auth::check())
        {
            /**
             * return view checkout
             */
            $getAllCartItems = $this->cart_repository->gettAllItemCart();
            $cartDao = $this->cart_repository;
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
