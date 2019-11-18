@extends('layout.admin.master')

@section('header')
    Create Category Product
@endsection

@section('content')
    @section('header')
        Create category Product
    @endsection
    <div class="row">
        <div class="col-lg-12">

            <div class="">
                <p><a href="{{ route('category-product.index') }}">Back List category</a></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Create category
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route'=> 'category-product.store', 'method' => 'post']) !!}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required minlength="5" name="name" placeholder="Category name">
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Slug"  >
                                </div>

                                <div class="form-group">
                                    <label>Descriptions</label>
                                    <input class="form-control" name="description" placeholder="Descriptions">
                                </div>

                                <div class="form-group">
                                    <label>Category Parent</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0" >Chọn</option>
                                        @foreach($getCateries as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
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