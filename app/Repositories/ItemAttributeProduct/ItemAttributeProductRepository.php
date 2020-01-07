<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/6/2020
 * Time: 6:09 PM
 */

namespace App\Repositories\ItemAttributeProduct;


use App\Product;
use Mockery\Exception;

class ItemAttributeProductRepository implements ItemAttributeProductRepositoryInterface
{
    public function addProductAttribute($pro_id, $att_id)
    {
        try{
            $product = Product::find($pro_id);
            $product->item_attributes()->attach($att_id);
            return true;
        }
        catch (Exception $exception)
        {
            return false;
        }
    }

    public function getAllAtrributeInProduct($pro_id)
    {
        // TODO: Implement getAllAtrributeInProduct() method.
        try{
            $array = [];
            $product = Product::find($pro_id);
            $list_atts = $product->item_attributes;

            $i=1;
            foreach ($list_atts as $att) {
                // In ngày tạo đơn hàng trong cột created_at nằm trong bảng product_order
                array_push($array,$att->pivot->items_attribute_id);
            }

            if ($array != null)
                return $array;
            else
                return null;
        }
        catch (Exception $exception)
        {
            return null;
        }
    }

    // update array attribute
    public function updateProductAttribute($pro_id, $arr)
    {
        // TODO: Implement updateProductAttribute() method.
        try{
            $product = Product::find($pro_id);
            $product->item_attributes()->sync($arr);
            return true;
        }
        catch (Exception $exception)
        {
            return false;
        }
    }

    public function deleteAllProductAttribute($pro_id)
    {
        // TODO: Implement deleteAllProductAttribute() method.
        try{
            $product = Product::find($pro_id);
            $product->item_attributes()->detach();
            return true;
        }
        catch (Exception $exception)
        {
            return false;
        }
    }
}