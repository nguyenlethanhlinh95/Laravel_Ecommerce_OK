<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use App\Repositories\CategoryProduct\CategoryProductRepositoryInterface;
use App\Repositories\ItemAttributeProduct\ItemAttributeProductRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mockery\Exception;
use Illuminate\Support\Facades\Session;
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
    private $attribute_repository;
    private $item_product_att;
    public function __construct(ItemAttributeProductRepositoryInterface $item_pro_att,AttributesRepositoryInterface $att, ProductRepositoryInterface $productRepo, CategoryProductRepositoryInterface $cateRepo)
    {
        $this->product_repository = $productRepo;
        $this->category_repository = $cateRepo;
        $this->attribute_repository = $att;
        $this->item_product_att = $item_pro_att;
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
        $sizes = $this->attribute_repository->getAllItemsAtt('Size');
        return view('admin.products.create', compact('categories', 'sizes'));
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
                $formInput['image'] = "image_null.jpg";
            }
            DB::beginTransaction();
            $product = Product::create($formInput);
            $pro_id = $product->id;
            // create detail size property
            if ($request->size != null)
            {
                $sizes = $request->size;
                foreach ($sizes as $item) {
                    $this->item_product_att->addProductAttribute($pro_id,$item);
                }
            }
            DB::commit();
//            // create product
            Session::flash('suc', 'You succesfully created a product.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            DB::rollBack();
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
            $categories = $this->category_repository->getAll();
            $pro = $this->product_repository->getDetail($id);
            $sizes = $this->attribute_repository->getAllItemsAtt('Size');
            $sizes_product = $this->item_product_att->getAllAtrributeInProduct($id);
            return view('admin.products.detail', compact('pro','sizes', 'sizes_product', 'categories'));
        }
        catch (Exception $ex)
        {
            return redirect()->route('product.index');
        }
//        $a = [1,2,3,4,5];
//        //dd($a);
//
//        $b = array();
//        array_push($b,1);
//        array_push($b,3);
//        foreach ($b as $c)
//            echo $c . ',';
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
            DB::beginTransaction();
            $formInput = $request->except('image');

            $product = $this->product_repository->getDetail($id);
            //dd($product);
            if($request->hasFile('image')){
                $image = $request->image;
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
//
            if ($request->size != null)
            {
                $sizes = $request->size;
                $sync_data = [];
                for($i = 0; $i < count($sizes); $i++)
                    $sync_data[$i] = $sizes[$i];

                $this->item_product_att->updateProductAttribute($id,$sync_data);
            }
            //if ($sizes)
            $product->update($formInput);

            DB::commit();
            Session::flash('inf', 'You succesfully updated a product.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            DB::rollBack();
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
