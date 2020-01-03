<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 8:51 AM
 */

namespace App\Repositories\ItemsAttributes;


interface ItemAttributesRepositoryInterface
{
    public function getAll();

    public function getDetail($id);

    public function delete($id);

    public function findIdParent($id);
}