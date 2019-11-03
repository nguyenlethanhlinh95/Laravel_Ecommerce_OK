@extends('layout.admin.master')

@section('header')
    Show Product
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="">
            {!! Form::model($cate, ['method'=>'Delete', 'action'=> ['CategoriesController@destroy', $cate->id]]) !!}
                <div>
                    <p>Are you deleting?</p>


                    <input type="submit" value="OK" class="btn btn-warning">


                    <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
                </div>
            <br>
            {!! Form::close() !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail category
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Category name</label>
                            <input value="{{ $cate->name  }}" class="form-control" required minlength="5" name="pro_name" placeholder="Prodcut name">
                        </div>

                        <div class="form-group">
                            <label>Description code</label>
                            <input value="{{ $cate->description }}" class="form-control" name="pro_code" placeholder="Prodcut code">
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection