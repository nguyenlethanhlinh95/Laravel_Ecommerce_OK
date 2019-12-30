<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/29/2019
 * Time: 8:56 PM
 */

namespace App\Repositories\Cart;


interface CartRepositoryInterface
{
    public function addCart($id);

    public function gettAllItemCart();

    public function boolCheckCart();

    public function deleteItemCart($id);

    public function boolCartUpdateItem($rowId, $qty);

    public function getCartItem($id);

    public function getSubTotal();

    public function getTax();

    public function getTotal();

    public function getCartCount();
}