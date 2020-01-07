<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 7:47 AM
 */

namespace App\Repositories\Attributes;

use Mockery\Exception;


interface AttributesRepositoryInterface
{
    public function getAll();

    public function getDetail($id);

    public function delete($id);

    public function getDetailAttribute($name);

    public function getAllItemsAtt($att);
}