<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Http\Requests\CategoryProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    private $cateProductDao = null;
    public function __construct()
    {
        $this->cateProductDao = new CategoryProductDao();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $listAll = $this->cateProductDao->getAllWithPagi();
        $categories = $this->cateProductDao->getAllSmall();
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
        $getCateries = $this->cateProductDao->getAllSmall();
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
        $cate = $this->cateProductDao->getDetail($id);
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
        $category = $this->cateProductDao->getDetail($id);
        $categories = $this->cateProductDao->getAllSmall();
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
            $cate = $this->cateProductDao->getDetail($id);

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
            $status =  $this->cateProductDao->deleteCategory($id);
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


/**
 * Class CategoryProductDao
 * @package App\Http\Controllers
 * returns List category product
 */
class CategoryProductDao extends CategoryProduct
{
    public function getAllWithPagi()
    {
        $page=\Config::get('app.page');
        return CategoryProduct::paginate($page);
    }
    public function getAll()
    {
        try{
            return CategoryProduct::all();
        }
        catch (Exception $ex)
        {
            return null;
        }

    }
    public function getAllSmall()
    {
        try{
            $data = DB::table('category_products')
                ->pluck('id', 'name');
            return $data;
        }
        catch (Exception $ex)
        {
            return null;
        }

    }
    public function getDetail($id)
    {
        return CategoryProduct::find($id);
    }

    public function insert(CategoryProduct $catItem)
    {
        try{
            $cate = new CategoryProduct;

            $cate->name = $catItem->name;
            $cate->slug = $catItem->slug;
            $cate->description = $catItem->description;
            $cate->parent_id = $catItem->parent_id;

            $cate->save();
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function deleteCategory($id)
    {
        try{
            $cat = $this->getDetail($id);
            if ($cat != null)
            {
                $cat->delete();

                return true;
            }
            return false;
        }
        catch (Exception $ex)
        {

            return false;
        }

    }
}

