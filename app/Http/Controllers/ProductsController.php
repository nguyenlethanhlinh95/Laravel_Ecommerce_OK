<?php

namespace App\Http\Controllers;
//namespace DAO;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\CategoryProduct\CategoryProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
//include "../../DAO/ProductDao.php";

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public  $product;
    //public $categories;

    private $product_repository;
    private $category_repository;
    public function __construct(ProductRepositoryInterface $productRepo, CategoryProductRepositoryInterface $cateRepo)
    {
        $this->product_repository = $productRepo;
        $this->category_repository = $cateRepo;
    }

    public function index()
    {
        $products = $this->product_repository->getAll();
        $categories_product = $this->category_repository->getAll();

        //echo '<pre>'; print_r($products); echo '</pre>';
        return view('admin.products.index', compact('products', 'categories_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->category_repository->getAll();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try
        {
            $formInput = $request->except('image');

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
        $pro = $this->product_repository->getDetail($id);
        //var_dump($pro);
        return view('admin.products.show', compact('pro'));
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
            $pro = $this->product_repository->getDetail($id);
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

            $product = $this->product_repository->getDetail($id);
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
            $status = $this->product_repository->delete($id);
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
