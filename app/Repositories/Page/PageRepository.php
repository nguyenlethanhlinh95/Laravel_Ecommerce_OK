<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 11:47 PM
 */

namespace App\Repositories\Page;


use App\Page;
use Mockery\Exception;

class PageRepository implements PageRepositoryInterface
{
    public function getAllPagi($number)
    {
        // TODO: Implement getAll() method.
        try{
            return Page::paginate($number);
        }
        catch (Exception $exception){

        }
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        try{
            return Page::find($id);
        }catch (Exception $exception){
            return null;
        }
    }

    public function delete($id){
        try{
            $page = $this->getDetail($id);
            if ($page != null)
            {
                $page->delete();
                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function getPage($page_name)
    {
        try{
            $data = Page::where('title', $page_name)
                ->first();
            if (empty($data))
                return null;
            else
                return $data;
        }
        catch (Exception $exception)
        {
            return null;
        }
    }
}