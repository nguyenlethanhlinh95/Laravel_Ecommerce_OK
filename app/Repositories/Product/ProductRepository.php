<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:26 PM
 */

namespace App\Repositories\Product;

use App\Product;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\Wishlist;
use App\Repositories\User\UserRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $user_repository;
    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getAll(){
        return Product::paginate(5);
        //return Product::all();
    }

    public function getDetail($id){
        try{
            return Product::find($id);
        }catch (Exception $exception){
            return null;
        }
    }

    public function delete($id){
        try{
            $pro = $this->getDetail($id);
            if ($pro != null)
            {
                $pro->delete();

                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {

            return false;
        }
    }

    public function getNewProduct($number){
        try{
            $products = DB::table('products')
                ->orderBy('created_at','DESC')
                ->take($number)
                ->get();
            return $products;
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function getProductDetail($id){
        try{
            return Product::find($id);
        }catch (Exception $exception){
            return null;
        }
    }

    /**
     * @param $user_id
     * @param $pro_id
     * @return bool
     */
    public function addWishList($user_id, $pro_id){
        try{
            $wishlist = new Wishlist();
            $wishlist->user_id = $user_id;
            $wishlist->pro_id = $pro_id;
            $wishlist->save();
            return true;
        }
        catch (Exception $exception){
            return false;
        }

    }

    /**
     * @param $user_id
     * @param $pro_id
     * @return bool
     */
    public function checkWishList($user_id, $pro_id){
        try{
            // kiem tra user trong wishlist
            // kiem tra san pham trong user wishlist
            $isCheckUserHaveWishList = $this->checkUserWishList($user_id);
            if ($isCheckUserHaveWishList){

            }
            else{

            }
            return true;
        }catch (Exception $exception){
            return false;
        }
    }

    public function checkProductWishList($user_id, $pro_id){
        try{
            $isCheck = DB::table('wishlists')
                ->where([
                    ['user_id', '=',$user_id ],
                    ['pro_id', '=', $pro_id]
                ])
                ->first();
            if ($isCheck != null){
                return true;
            }
            return false;

        }catch (Exception $exception){
            return false;
        }
    }

    public function viewWishList($user_id){
        try{
            $user= $this->user_repository->getUserById($user_id);
            $products = $user->products()->get();
            if ($products != null){
                return $products;
            }else{
                return null;
            }
        }catch (Exception $exception){
            return null;
        }
    }

    public function countWishlist($user_id){
        try{
            $user= $this->user_repository->getUserById($user_id);
            $count_product = $user->products()->count();
            if ($count_product != 0){
                return $count_product;
            }else{
                return 0;
            }
        }catch (Exception $exception){
            return 0;
        }
    }

    public function removeWishlist($user_id, $pro_id){
        try{
            DB::table('wishlists')
                ->where([
                    ['user_id',$user_id],
                    ['pro_id',$pro_id]
                ])
                ->delete();
            return true;
        }
        catch (Exception $exception){
            return false;
        }
    }

    public function countProducts()
    {
        // TODO: Implement countProducts() method.
        try{
            $count = Product::count();
            return $count;
        }
        catch (Exception $exception)
        {
            return 0;
        }
    }

    public function searchNameAndContent($str)
    {
        // TODO: Implement searchNameAndContent() method.
        try{
            $data = Product::where('pro_name', 'LIKE', "%$str%")
                //->orWhere('content', 'LIKE', "%$str%")
                ->get();
            if ($data != null)
            {
                return $data;
            }else{
                return null;
            }
        }
        catch (Exception $exception)
        {
            return null;
        }
    }
}