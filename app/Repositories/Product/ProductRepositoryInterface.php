<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:25 PM
 */

namespace App\Repositories\Product;


interface ProductRepositoryInterface
{
    public function getAll();

    public function getDetail($id);

    public function delete($id);

    public function getNewProduct($number);

    public function getProductDetail($id);
}