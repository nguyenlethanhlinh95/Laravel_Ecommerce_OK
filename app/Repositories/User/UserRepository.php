<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 2:42 PM
 */

namespace App\Repositories\User;

use App\Address;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class UserRepository implements UserRepositoryInterface
{

    public function getId(){
        return Auth::user()->id;
    }

    public function getUserById($user_id)
    {
        try{
            $user = User::find($user_id);
            if ($user != null){
                return $user;
            }else{
                return null;
            }
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function getAddressByUserId($user_id){
        $address_data = Address::where('user_id',$user_id)->orderBy('id','DESC')->first();
        return $address_data;
    }

    public function getUser()
    {
        // TODO: Implement getUser() method.
        try{
            return Auth::user();
        }catch(Exception $exception){
            return null;
        }
    }

    public function checkPassword($user_password){
        try{
            if(!Hash::check($user_password, Auth::user()->password)){
                return false;
            }else{
                return true;
            }
        }catch(Exception $exception){
            return false;
        }
    }

    public function updatePassword($new_user_password){
        try{
            $user = $this->getUser();
            $user->fill(['password' => Hash::make($new_user_password)])->save();
        }catch(Exception $exception){
            return false;
        }
    }

}