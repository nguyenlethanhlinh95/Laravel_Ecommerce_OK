<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:25 PM
 */

namespace App\Repositories\Product;

use Mockery\Exception;

interface ProductRepositoryInterface
{
    public function getAll();

    public function getDetail($id);

    public function delete($id);

    public function getNewProduct($number);

    public function getProductDetail($id);

    public function addWishList($user_id, $pro_id);

    public function checkWishList($user_id, $pro_id);

    /**
     * @param $user_id
     * @param $pro_id
     * @return bool
     */
    public function checkProductWishList($user_id, $pro_id);

    /**
     * @param $user_id
     * @return object
     */
    public function viewWishList($user_id);

    public function countWishlist($user_id);

    public function removeWishlist($user_id, $pro_id);

    public function countProducts();

    public function searchNameAndContent($str);
}