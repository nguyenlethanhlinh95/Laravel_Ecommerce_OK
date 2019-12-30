<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/29/2019
 * Time: 8:57 PM
 */

namespace App\Repositories\Cart;

use App\Repositories\Product\ProductRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartRepository implements  CartRepositoryInterface
{
    private $product_repository;
    public function __construct(ProductRepositoryInterface $product_repo)
    {
        $this->product_repository = $product_repo;
    }

    public function addCart($id){
        try{
            $product = $this->product_repository->getDetail($id);
            Cart::add($id, $product->pro_name, 1, $product->pro_price, ['img' => $product->image, 'stock' => $product->stock]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function gettAllItemCart()
    {
        try{
            return Cart::content();
        }
        catch (Exception $ex)
        {
            return false;
        }

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
            return null;
        }
    }

    public function getTax()
    {
        try{
            return Cart::tax();
        }
        catch (Exception $ex)
        {
            return null;
        }
    }

    public function getTotal()
    {
        try{
            return Cart::total();
        }
        catch (Exception $ex)
        {
            return null;
        }
    }

    public function getCartCount()
    {
        try{
            return Cart::count();
        }
        catch (Exception $ex)
        {
            return null;
        }
    }
}