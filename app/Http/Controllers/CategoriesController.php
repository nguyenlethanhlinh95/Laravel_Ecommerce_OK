<?php

namespace App\Http\Controllers;

use App\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Str;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CategoryRequest;



class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $category;
    public $categoryRepository;
    public function __construct(CategoryRepositoryInterface $category_repo)
    {
        //$this->category = new categoryDao();
        $this->categoryRepository = $category_repo;
    }

    public function index()
    {
        //
        $listAll = $this->categoryRepository->gettAllWithPagi();
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.index', ['categories'=>$listAll, 'categories2' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        try{
            $formInput = $request->all();

            if($formInput["slug"] == "")
            {
                $slug = Str::slug($formInput["name"], '-');
                $formInput["slug"] = $slug;
            }

            Category::create($formInput);

            Session::flash('suc', 'You succesfully created a category.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            Session::flash('err', 'Errors !');
            return redirect()->back();
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
        $cat = $this->categoryRepository->getDetail($id);
        return view('admin.categories.show', ['cate' => $cat]);
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
        $category = $this->categoryRepository->getDetail($id);
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.detail', ['category'=>$category, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try{
            $cate = $this->categoryRepository->getDetail($id);
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
            $status =  $this->categoryRepository->delete($id);
            if ($status)
            {
                Session::flash('suc', 'You succesfully Deleted a category.');
                return redirect()->route('category.index');
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

