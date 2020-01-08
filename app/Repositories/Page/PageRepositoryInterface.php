<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/3/2020
 * Time: 11:47 PM
 */

namespace App\Repositories\Page;

use Mockery\Exception;

interface PageRepositoryInterface
{
    public function getAllPagi($number);

    public function getDetail($id);

    public function delete($id);

    public function getPage($page_name);
}