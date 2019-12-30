<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 9:03 PM
 */

namespace App\Repositories\Category;

use App\Category;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryRepository
 * @package App\Repositories\Category
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        try{
            return Category::all();
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function gettAllWithPagi()
    {
        // TODO: Implement gettAllWithPagi() method.
        try{
            $page=\Config::get('app.page');
            return Category::paginate($page);
        }
        catch (Exception $exception){
            return null;
        };

    }

    public function getAllSmall()
    {
        // TODO: Implement getAllSmall() method.
        try{
            $data = DB::table('categories')
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
            return Category::find($id);
        }
        catch (Exception $exception){
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