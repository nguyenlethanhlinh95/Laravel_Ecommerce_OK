<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/6/2020
 * Time: 6:09 PM
 */

namespace App\Repositories\ItemAttributeProduct;


interface ItemAttributeProductRepositoryInterface
{
    public function addProductAttribute($pro_id, $att_id);

    public function getAllAtrributeInProduct($pro_id);

    public function updateProductAttribute($pro_id, $arr);

    public function deleteAllProductAttribute($pro_id);
}