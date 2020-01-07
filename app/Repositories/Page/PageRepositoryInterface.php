<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 11:47 PM
 */

namespace App\Repositories\Page;


interface PageRepositoryInterface
{
    public function getAllPagi($number);

    public function getDetail($id);

    public function delete($id);
}