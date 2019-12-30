<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:38 PM
 */

namespace App\Repositories\CategoryProduct;
use Mockery\Exception;
use App\CategoryProduct;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryProductRepository
 * @package App\Repositories\CategoryProduct
 */
class CategoryProductRepository implements CategoryProductRepositoryInterface
{
    public function getAllPagi(){
        try{
            $page=\Config::get('app.page');
            return CategoryProduct::paginate($page);
        }catch (Exception $exception){
            return null;
        }
    }

    public function getAll(){
        try{
            return CategoryProduct::all();
        }
        catch (Exception $ex)
        {
            return null;
        }
    }

    public function getAllSmall()
    {
        // TODO: Implement getAllSmall() method.
        try{
            $data = DB::table('category_products')
                ->pluck('id', 'name');
            return $data;
        }
        catch (Exception $ex)
        {
            return null;
        }
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        try{
            return CategoryProduct::find($id);
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
}