@extends('layout.admin.master')

@section('header')
    Detail Category Product
@endsection

@section('content')
@section('header')
    Detail category Product
@endsection
<div class="row">
    <div class="col-lg-12">

        <div class="">
            <p><a href="{{ route('category-product.index') }}">Back List category product</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail category product
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['CategoryProductController@update', $category->id]]) !!}
                        {{--{{ method_field('PUT') }}--}}
                        <div class="form-group">
                            <label>Category name</label>
                            <input value="{{ $category->name  }}" class="form-control" required name="name" placeholder="Category name">
                        </div>

                        <div class="form-group">
                            <label>Category Slug</label>
                            <input value="{{ $category->slug }}" class="form-control" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <label>Category description</label>
                            <input value="{{ $category->description }}" class="form-control" name="description" placeholder="Prodcut price">
                        </div>

                        <div class="form-group">
                            <label>Category Parent</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Chọn</option>
                                @foreach($categories as $key =>$value)
                                    <option @if($value == $category->parent_id) {{ "selected" }} @endif value="{{ $value}}">{{ $key }}</option>
                                @endforeach
                            </select>
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