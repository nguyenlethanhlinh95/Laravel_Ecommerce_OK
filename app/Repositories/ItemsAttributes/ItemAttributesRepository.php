<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 8:51 AM
 */

namespace App\Repositories\ItemsAttributes;

use App\ItemsAttribute;
use Mockery\Exception;

class ItemAttributesRepository implements ItemAttributesRepositoryInterface
{
    public function getAll()
    {
        try{
            return ItemsAttribute::all();
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        try{
            return ItemsAttribute::find($id);
        }catch (Exception $exception){
            return null;
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try{
            $cat = $this->getDetail($id);
            if ($cat != null)
            {
                $cat->delete();
                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function findIdParent($id)
    {
        // TODO: Implement findParentAttribute() method.
        try{
            $att = ItemsAttribute::find($id);
            if ($att != null){
                return $att->attributes_id;
            }else{
                return null;
            }
        }
        catch (Exception $exception)
        {

        }
    }
}