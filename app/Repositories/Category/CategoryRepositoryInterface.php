<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 9:03 PM
 */

namespace App\Repositories\Category;


interface CategoryRepositoryInterface
{
    public function getAll();

    public function gettAllWithPagi();

    public function getAllSmall();

    public function getDetail($id);

    public function delete($id);
}