<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 7:47 AM
 */

namespace App\Repositories\Attributes;
use App\Attributes;

/**
 * Class AttributesRepository
 * @package App\Repositories\Attributes
 */
class AttributesRepository implements AttributesRepositoryInterface
{
    public function getAll(){
        try{
            return Attributes::all();
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        try{
            return Attributes::find($id);
        }catch (Exception $exception){
            return null;
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try{
            $att = $this->getDetail($id);
            if ($att != null)
            {
                $att->delete();
                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }
}