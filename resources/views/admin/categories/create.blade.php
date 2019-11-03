@extends('layout.admin.master')

@section('header')
    Create Category
@endsection

@section('content')
    @section('header')
        Create category post
    @endsection
    <div class="row">
        <div class="col-lg-12">

            <div class="">
                <p><a href="{{ route('category.index') }}">Back List category</a></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Create category
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route'=> 'category.store', 'method' => 'post']) !!}
                                <div class="form-group">
                                    <label>Category name</label>
                                    <input class="form-control" required minlength="5" name="name" placeholder="Category name">
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Slug Category">
                                </div>

                                <div class="form-group">
                                    <label>Descriptions</label>
                                    <input class="form-control" name="description" placeholder="Category descriptions">
                                </div>

                                <div class="form-group">
                                    <label>Category Parent</label>
                                    <select name="categories" class="form-control">
                                        <option >Chọn</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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