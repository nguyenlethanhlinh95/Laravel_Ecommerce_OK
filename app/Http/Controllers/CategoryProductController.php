<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Http\Requests\CategoryProductRequest;
use App\Repositories\CategoryProduct\CategoryProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    //private $cateProductDao = null;

    //private $category_product_repository;
    public function __construct(CategoryProductRepositoryInterface $categoryProductRepo)
    {
        //$this->cateProductDao = new CategoryProductDao();
        $this->category_product_repository = $categoryProductRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $listAll = $this->category_product_repository->getAllPagi();
        $categories = $this->category_product_repository->getAllSmall();
        return view('admin.categories_product.index', compact('listAll', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getCateries = $this->category_product_repository->getAllSmall();
        return view('admin.categories_product.create',compact('getCateries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryProductRequest $request)
    {
        //
        $formInput = $request->all();
        if($formInput["slug"] == "")
        {
            $slug = Str::slug($formInput["name"], '-');
            $formInput["slug"] = $slug;
        }
        CategoryProduct::create($formInput);

        Session::flash('suc', 'You succesfully created a category product.');
        return redirect()->back();
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
        $cate = $this->category_product_repository->getDetail($id);
        return view('admin.categories_product.show', compact('cate'));
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
        $category = $this->category_product_repository->getDetail($id);
        $categories = $this->category_product_repository->getAllSmall();
        return view('admin.categories_product.detail', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryProductRequest $request, $id)
    {
        //
        try{
            $cate = $this->category_product_repository->getDetail($id);

            $input = $request->all();
            $cate->fill($input)->save();

            Session::flash('inf', 'You succesfully updated a category.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            Session::flash('err', 'You not updated a category.');
            return redirect()->back();
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
            $status =  $this->category_product_repository->delete($id);
            if ($status)
            {
                Session::flash('suc', 'You succesfully Deleted a category.');
                return redirect()->route('category-product.index');
            }
            else
            {
                Session::flash('err', 'You not Deleted a category.');
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


