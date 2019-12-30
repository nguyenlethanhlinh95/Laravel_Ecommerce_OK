<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:38 PM
 */

namespace App\Repositories\CategoryProduct;


interface CategoryProductRepositoryInterface
{
    public function getAllPagi();

    public function getAll();

    public function getAllSmall();

    public function getDetail($id);

    public function delete($id);
}