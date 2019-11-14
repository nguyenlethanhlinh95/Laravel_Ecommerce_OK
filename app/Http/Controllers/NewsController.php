<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}


//class NewsDao extends New
//{
//    public function getAll()
//    {
//        return Product::paginate(5);
//    }
//
//    public function getDetail($id)
//    {
//        return Product::find($id);
//    }
//
//    public function deleteP($id)
//    {
//        try{
//            $pro = $this->getDetail($id);
//            if ($pro != null)
//            {
//
//                $image_name = $pro->image;
//
//                if ($image_name != "image_null.jpg")
//                {
//                    $image_path = "images/" . $pro->image;  // Value is not URL but directory file path
//
//                    unlink($image_path);
//                }
//
//                $pro->delete();
//
//                return true;
//            }
//            return false;
//        }
//        catch (Exception $ex)
//        {
//
//            return false;
//        }
//
//    }
//
//    public function getNewProduct()
//    {
//        try
//        {
//            $products = DB::table('products')
//                ->OrderBy('created_at', 'desc')
//                ->limit(4)
//                ->get();
//            return $products;
//        }
//        catch (Exception $ex)
//        {
//            $products = null;
//        }
//
//        $products = null;
//
//    }
//
//    public function getProductDetail($id)
//    {
//        $product = DB::table('products')
//            ->find($id)
//            ->get();
//        return $product;
//    }
//}
