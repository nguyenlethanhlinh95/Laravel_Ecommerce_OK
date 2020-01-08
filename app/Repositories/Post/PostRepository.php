<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/8/2020
 * Time: 8:23 PM
 */

namespace App\Repositories\Post;

use App\Post;
use Mockery\Exception;

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        // TODO: Implement getAll() method.
        try{
            $posts = Post::all();
            if ($posts != null){
                return $posts;
            }else{
                return null;
            }
        }
        catch (Exception $ex)
        {
            return null;
        }
    }

    public function getAllWithPagi()
    {
        // TODO: Implement getAllWithPagi() method.
        try{
            $page=\Config::get('app.page');
            $posts = Post::paginate($page);

            return $posts;
        }
        catch (Exception $exception)
        {
            return null;
        }
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        try{
            $post = Post::find($id);
            if ($post != null)
            {
                return $post;
            }
            else
            {
                return null;
            }
        }
        catch (Exception $exception)
        {
            return null;
        }
    }

//    public function getCategoryName($idPost)
//    {
//        // TODO: Implement getCategoryName() method.
//        try{
//            $cate = Post::find($idPost)->category()->select('name')->first();
//            return $cate;
//        }
//        catch (Exception $ex)
//        {
//            return null;
//        }
//    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try{
            $post = $this->getDetail($id);
            if ($post != null)
            {
                $post->delete();
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $exception)
        {
            return false;
        }
    }
}