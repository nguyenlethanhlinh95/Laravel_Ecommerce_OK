<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/8/2020
 * Time: 8:23 PM
 */

namespace App\Repositories\Post;


interface PostRepositoryInterface
{
    public function getAll();

    public function getAllWithPagi();

    public function getDetail($id);

    //public function getCategoryName($idPost);

    public function delete($id);
}