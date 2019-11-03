@extends('layout.admin.master')

@section('header')
    Create Product
@endsection

@section('content')
    @section('header')
        Create product
    @endsection
    <div class="row">
        <div class="col-lg-12">

            <div class="">
                <p><a href="{{ route('product.index') }}">Back List product</a></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Create product
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route'=> 'product.store', 'method' => 'post', 'files'=> 'true' ]) !!}
                                <div class="form-group">
                                    <label>Product name</label>
                                    <input class="form-control" required minlength="5" name="pro_name" placeholder="Prodcut name">
                                </div>

                                <div class="form-group">
                                    <label>Product code</label>
                                    <input class="form-control" name="pro_code" placeholder="Prodcut code">
                                </div>

                                <div class="form-group">
                                    <label>Product price</label>
                                    <input class="form-control" name="pro_price" placeholder="Prodcut price">
                                </div>

                                <div class="form-group">
                                    <label>Product discount price</label>
                                    <input class="form-control" name="spl_price" placeholder="Prodcut discount price">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" placeholder="Description">
                                </div>

                            <div class="form-group">
                                <label>Content</label>
                                <input class="form-control" name="content" placeholder="content">
                            </div>

                            <div class="form-group">
                                {{ Form::label('image', 'Image') }}
                                {{ Form::file('image',array('class' => 'form-control', 'name'=>'image')) }}
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