<?php

namespace App\Http\Controllers;

use App\Attributes;
use App\Http\Requests\ItemsAttributesRequest;
use App\ItemsAttribute;
use App\Repositories\ItemsAttributes\ItemAttributesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class ItemsAttributesController extends Controller
{
    private $itemsAttributesRepository;
    public function __construct(ItemAttributesRepositoryInterface $item)
    {
        $this->itemsAttributesRepository = $item;
    }

    public function list_add($id)
    {
        try{
            $items_attributes = $this->itemsAttributesRepository->getItemsAttById($id);
            $id = $id;
            return view('admin.items_attributes.addnew_list_itemsAttributes', compact('items_attributes', 'id'));
        }
        catch (Exception $exception)
        {

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // lay id attributes, lay ra danh sach thuoc tinh

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
    public function store(ItemsAttributesRequest $request)
    {
        //
        try{
            $formInput = $request->all();
            ItemsAttribute::create($formInput);
            Session::flash('suc', 'You succesfully created a items attributes.');
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
            $item_atts = $this->itemsAttributesRepository->getDetail($id);
            $id = $this->itemsAttributesRepository->findIdParent($id);
            return view('admin.items_attributes.show', compact('item_atts', 'id'));
        }
        catch (Exception $exception)
        {

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
            $item_detail = $this->itemsAttributesRepository->getDetail($id);
            $id = $this->itemsAttributesRepository->findIdParent($id);
            return view('admin.items_attributes.detail', compact('item_detail', 'id'));
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
    public function update(ItemsAttributesRequest $request, $id)
    {
        //
        try{
            $item_att = $this->itemsAttributesRepository->getDetail($id);

            $input = $request->all();
            $item_att->fill($input)->save();

            Session::flash('inf', 'You succesfully updated a item attribute.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {
            Session::flash('err', 'You not updated a item attribute.');
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
            $id_attri_parent = $this->itemsAttributesRepository->findIdParent($id);
            $status =  $this->itemsAttributesRepository->delete($id);

            if ($status)
            {
                Session::flash('suc', 'You succesfully deleted a item attribute.');
                return redirect()->route('items_list_attributes', ['id'=>$id_attri_parent]);
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
