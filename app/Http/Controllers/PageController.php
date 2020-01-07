<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Page;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mockery\Exception;

class PageController extends Controller
{
    private $page_repository;
    public function __construct(PageRepositoryInterface $page)
    {
        $this->page_repository = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $row_number=\Config::get('app.page');
            $getAllPage = $this->page_repository->getAllPagi($row_number);
            return view('admin.page.index', compact('getAllPage'));

        }
        catch (Exception $exception)
        {
            abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        //
        try{
            $user_id = Auth::user()->id;
            $formInput = $request->all();
            $formInput["user_id"] = $user_id;
            if($formInput["slug"] == "")
            {
                $slug = Str::slug($formInput["name"], '-');
                $formInput["slug"] = $slug;
            }
            Page::create($formInput);

            Session::flash('suc', 'You succesfully created a page.');
            return redirect()->back();
        }
        catch (Exception $exception)
        {
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $page = $this->page_repository->getDetail($id);
            if (isset($page))
            {
               return view('admin.page.detail', compact('page'));
            }
            else
            {
                abort('404');
            }
        }
        catch (Exception $exception)
        {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
