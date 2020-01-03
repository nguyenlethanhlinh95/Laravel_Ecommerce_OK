@extends('layout.admin.master')

@section('header')
    Detail Items Attributes
@endsection

@section('content')
@section('header')
    Detail Items Attributes
@endsection
<div class="row">
    <div class="col-lg-12">

        <div class="">
            <p><a href="{{ route('items_list_attributes', ['id'=>$id]) }}">Back List Items Attributes</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Items Attributes
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($item_detail, ['method'=>'PATCH', 'action'=> ['ItemsAttributesController@update', $item_detail->id]]) !!}
                        {{--{{ method_field('PUT') }}--}}
                        <div class="form-group">
                            <label>Category name</label>
                            <input value="{{ $item_detail->name }}" class="form-control" required name="name" placeholder="Category name">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection