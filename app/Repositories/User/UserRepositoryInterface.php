<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 2:41 PM
 */

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getId();

    public function getAddressByUserId($user_id);

    public function getUser();

    public function checkPassword($user_password);

    public function updatePassword($user_password);
}