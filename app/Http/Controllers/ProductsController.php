<?php

namespace App\Http\Controllers;
//namespace DAO;

use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;
//include "../../DAO/ProductDao.php";

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $product;
    public function __construct()
    {
        $this->product = new ProductDao();
    }

    public function index()
    {
        $listAll = $this->product->getAll();
        return view('admin.products.index', ['products'=>$listAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $formInput = $request->except('image');

            $this->validate($request, [
                'pro_name' => 'required',
                'pro_code' => 'required',
                'pro_price' => 'required',
                'image'=>'image|mimes:png,jpg,jpeg|max:10000'
            ]);

            $image = $request->image;
            if($image){
                $datetime = date('mdYhis', time());
                $imageName=$image->getClientOriginalName();

                $Hinh = $datetime. "_" . $imageName;

                $image->move('images',$Hinh);
                $formInput['image']=$Hinh;
            }
            else
            {
                //$image =
                $formInput['image'] = "image_null.jpg";
            }

            Product::create($formInput);

            Session::flash('suc', 'You succesfully created a product.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pro = $this->product->getDetail($id);
        return view('admin.products.show', ['pro' => $pro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try
        {
            $pro = $this->product->getDetail($id);
            return view('admin.products.detail', ['pro'=>$pro]);
        }
        catch (Exception $ex)
        {
            return redirect()->route('product.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try
        {
            $formInput = $request->except('image');

            $this->validate($request, [
                'pro_name' => 'required',
                'pro_code' => 'required',
                'pro_price' => 'required',
                'image'=>'image|mimes:png,jpg,jpeg|max:10000'
            ]);

            $product = $this->product->getDetail($id);
            $image = $request->image;
            if($image){
                $datetime = date('mdYhis', time());
                $imageName=$image->getClientOriginalName();

                $Hinh = $datetime. "_" . $imageName;
                while(file_exists('images' . $Hinh)){
                    $Hinh = $datetime. "_" . $imageName;
                }
                $image->move('images',$Hinh);

                // xoa hinh cu
                if ($product->image != null)
                {
                    unlink( 'images' . $product->image);
                }


                $formInput['image']=$Hinh;
            }

            $product->update($formInput);

            Session::flash('inf', 'You succesfully updated a product.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $status =  $this->product->deleteP($id);
            if ($status)
            {
                Session::flash('suc', 'You succesfully Deleted a product.');
                return redirect()->route('product.index');
            }
            else
            {
                Session::flash('err', 'You not Deleted a product.');
                return redirect()->back();
            }
        }
        catch (Exception $ex)
        {
            Session::flash('err', 'You not Deleted a product.');
            return redirect()->back();
        }
    }
}


class ProductDao extends Product
{
    public function getAll()
    {
        return Product::paginate(5);
    }

    public function getDetail($id)
    {
        return Product::find($id);
    }

    public function deleteP($id)
    {
        try{
            $pro = $this->getDetail($id);
            if ($pro != null)
            {

                $image_name = $pro->image;

                if ($image_name != "image_null.jpg")
                {
                    $image_path = "images/" . $pro->image;  // Value is not URL but directory file path

                    unlink($image_path);
                }

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

    public function getNewProduct()
    {
        try
        {
            $products = DB::table('products')
                ->OrderBy('created_at', 'desc')
                ->limit(4)
                ->get();
            return $products;
        }
        catch (Exception $ex)
        {
            $products = null;
        }

        $products = null;

    }

    public function getProductDetail($id)
    {
        $product = DB::table('products')
                        ->find($id)
                        ->get();
        return $product;
    }
}


