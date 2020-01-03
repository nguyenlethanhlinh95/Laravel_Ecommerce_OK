<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributesRequest;
use App\Repositories\Attributes\AttributesRepositoryInterface;
use Illuminate\Http\Request;
use App\Attributes;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class AttributesController extends Controller
{
    private $attributesRepository;
    public function __construct(AttributesRepositoryInterface $attri)
    {
        $this->attributesRepository = $attri;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attributes = $this->attributesRepository->getAll();
        return view('admin.attributes.addnew_list_attributes', compact('attributes'));
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
    public function store(AttributesRequest $request)
    {
        //
        try{
            $formInput = $request->all();
            Attributes::create($formInput);
            Session::flash('suc', 'You succesfully created a attributes.');
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
        try{
            $att = $this->attributesRepository->getDetail($id);
            if (isset($att))
            {
                return view('admin.attributes.show', compact('att'));
            }
            else
            {
                abort(404, 'asdasd');
            }
        }
        catch (Exception $exception)
        {
            echo 456;
        }
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
        try{
            $att = $this->attributesRepository->getDetail($id);
            return view('admin.attributes.detail', compact('att'));
        }
        catch (Exception $exception)
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
    public function update(AttributesRequest $request, $id)
    {
        //
        try{
            $att = $this->attributesRepository->getDetail($id);
            $input = $request->all();
            $att->fill($input)->save();

            Session::flash('inf', 'You succesfully updated a attribute.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            Session::flash('err', 'You not updated a attribute.');
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
            $status =  $this->attributesRepository->delete($id);
            if ($status)
            {
                Session::flash('suc', 'You succesfully deleted a attribute.');
                return redirect()->route('attribute.index');
            }
            else
            {
                return redirect()->back()->with('err', 'You not deleted a item attribute.');
            }
        }
        catch (Exception $ex)
        {
            return redirect()->back()->with('err', 'You not deleted a item attribute.');
        }
    }
}
