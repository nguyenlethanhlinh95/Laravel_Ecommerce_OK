<?php

namespace App\Http\Controllers;

use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cart_repository;
    public function __construct(CartRepositoryInterface $cartRepo)
    {
        $this->cart_repository = $cartRepo;
    }

    public function index()
    {
        try {
            $boolCart = $this->cart_repository->boolCheckCart();
            if ($boolCart > 0) {
                $cartItems = $this->cart_repository->gettAllItemCart();
                return view('front.cart.index', ['cartItems' => $cartItems]);
            } else {
                return view('front.cart.empty');
            }

        } catch (Exception $ex) {

        }


    }

    public function addItem($id)
    {
        $boolAddItemCart = $this->cart_repository->addCart($id);
        if ($boolAddItemCart){
            Session::flash('suc', 'You succesfully added a product.');
            return back();
        }else{
            Session::flash('err', 'You err a product.');
            return back();
        }
    }

    public function destroy($id)
    {
        $boolDeleteItemCart = $this->cart_repository->deleteItemCart($id);
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

        $boolUpdateItem = $this->cart_repository->boolCartUpdateItem($rowId,$qty);

        if ($boolUpdateItem)
        {
            $cartItem = $this->cart_repository->getCartItem($rowId);
            $total = $this->cart_repository->getTotal();
            $tax = $this->cart_repository->getTax();
            $subtotal = $this->cart_repository->getSubTotal();

            return response()->json(['data'=>$cartItem, 'total'=> $total, 'tax'=>$tax, 'subtotal' => $subtotal], 200);
        }
        else
        {
            Session::flash('err', 'You can\'t update this product.');
            return back();
        }
    }

}
