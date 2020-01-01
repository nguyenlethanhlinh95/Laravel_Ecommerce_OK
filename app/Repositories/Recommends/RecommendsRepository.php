<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/1/2020
 * Time: 3:50 PM
 */

namespace App\Repositories\Recommends;
use App\Recommend;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

/**
 * Class RecommendsRepository
 * @package App\Repositories\Recommends
 */
class RecommendsRepository implements RecommendsRepositoryInterface
{
    public function addRecommend($user_id, $pro_id){
        try{
            $recommend = new Recommend();
            $recommend->uid = $user_id;
            $recommend->pro_id = $pro_id;
            $recommend->save();
        }
        catch (Exception $exception){
            return false;
        }
    }

    public function checkRecommend($user_id, $pro_id){
        try{
            $isCheck = DB::table('recommends')
                        ->where([
                            ['pro_id',$pro_id],
                            ['uid', $user_id]
                        ])
                        ->first();
            if ($isCheck != null){
                return true;
            }
            return false;
        }
        catch (Exception $exception){
            return false;
        }
    }

    public function getProducts($number_product){
        try{
            $products1 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->select('pro_id','pro_name','image','pro_price', DB::raw('count(*) as total'))
                ->groupBy('pro_id','pro_name','image','pro_price')
                ->orderby('total','DESC')
                ->take(3)
                ->get();
            return $products1;
        }
        catch (Exception $exception){
            return null;
        }

    }

    public function checkUser($user_id){
        try{
            $isCheckUser = DB::table('recommends')
                ->where('uid',$user_id)
                ->first();
            if ($isCheckUser != null){
                return true;
            }
            return false;
        }
        catch (Exception $exception){
            return false;
        }
    }
}