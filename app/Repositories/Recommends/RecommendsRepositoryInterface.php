<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/1/2020
 * Time: 3:50 PM
 */

namespace App\Repositories\Recommends;

/**
 * Interface RecommendsRepositoryInterface
 * @package App\Repositories\Recommends
 */
interface RecommendsRepositoryInterface
{
    public function addRecommend($user_id, $pro_id);
    public function checkRecommend($user_id, $pro_id);
    public function getProducts($number_product);
    public function checkUser($user_id);
}