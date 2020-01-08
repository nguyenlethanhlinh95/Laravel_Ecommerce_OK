<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $post;
    private $cate;

    private $categoresRepository;

    public function __construct(CategoryRepositoryInterface $category, PostRepositoryInterface $p)
    {
        $this->post = $p;
        $this->categoresRepository = $category;
    }

    public function index()
    {
        //
        $posts = $this->post->getAllWithPagi();

        $categoryName = $this->categoresRepository->getAllSmall();
        return view('admin.posts.index', compact('posts', 'categoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->categoresRepository->getAll();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $formInput = $request->all();
        if($formInput["slug"] == "")
        {
            $slug = Str::slug($formInput["name"], '-');
            $formInput["slug"] = $slug;
        }

        $image = $request->image;
        if($image){
            $datetime = date('mdYhis', time());
            $imageName=$image->getClientOriginalName();

            $Hinh = $datetime. "_" . $imageName;

            $image->move('images/posts',$Hinh);
            $formInput['image']= 'posts/' . $Hinh;
        }
        else
        {
            //$image =
            $formInput['image'] = 'posts/news_null.png';
        }

        Post::create($formInput);
        Session::flash('suc', 'You succesfully created a post.');
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
            $post = $this->post->getDetail($id);
            $categories = $this->categoresRepository->getAllSmall();
            return view('admin.posts.detail', compact('post', 'categories'));
        }
        catch (Exception $ex)
        {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        try
        {
            $post = $this->post->getDetail($id);
            $formInput = $request->all();
            if($formInput["slug"] == "")
            {
                $slug = Str::slug($formInput["name"], '-');
                $formInput["slug"] = $slug;
            }


            if($request->hasFile('image')){
                $image = $request->image;
                $datetime = date('mdYhis', time());

                $imageName=$image->getClientOriginalName();

                $Hinh = $datetime. "_" . $imageName;

                $image->move('images/posts',$Hinh);
                // xoa hinh cu
                if ($post->image != "posts/news_null.png")
                {
                    unlink( 'images/' .$post->image);
                }

                $formInput['image']= 'posts/' . $Hinh;
            }

            $post->fill($formInput)->save();
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
    }
}
