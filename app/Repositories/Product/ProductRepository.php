<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 12/28/2019
 * Time: 10:26 PM
 */

namespace App\Repositories\Product;

use App\Product;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ProductRepository implements ProductRepositoryInterface
{
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
}