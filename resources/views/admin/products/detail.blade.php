@extends('layout.admin.master')

@section('header')
    Detail Product
@endsection

@section('content')
@section('header')
    Detail product
@endsection
<div class="row">
    <div class="col-lg-12">

        <div class="">
            <p><a href="{{ route('product.index') }}">Back List product</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail product
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($pro, ['method'=>'POST', 'action'=> ['ProductsController@update', $pro->id], 'files'=>true]) !!}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Product name</label>
                            <input value="{{ $pro->pro_name  }}" class="form-control" required minlength="5" name="pro_name" placeholder="Prodcut name">
                        </div>

                        <div class="form-group">
                            <label>Product code</label>
                            <input value="{{ $pro->pro_code }}" class="form-control" name="pro_code" placeholder="Prodcut code">
                        </div>

                        <div class="form-group">
                            <label>Product price</label>
                            <input value="{{ $pro->pro_price }}" class="form-control" name="pro_price" placeholder="Prodcut price">
                        </div>

                        <div class="form-group">
                            <label>Product discount price</label>
                            <input value="{{ $pro->spl_price }}" class="form-control" name="spl_price" placeholder="Prodcut discount price">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input value="{{ $pro->description }}" class="form-control" name="description" placeholder="Description">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <input value="{{ $pro->content }}" class="form-control" name="content" placeholder="content">
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            <br>
                            @if($pro->image != null)
                                <img class="card-img-top img-fluid" src="{{ 'images/'}}{{ $pro->image }} " style="width:100px; height: 70px" alt="Card image cap">
                                {{ Form::file('image',array('class' => 'form-control', 'name'=>'image')) }}
                            @else
                                <img class="card-img-top img-fluid" src="{{ 'images/image_null.jpg'}}" style="width:100px; height: 70px" alt="Card image cap">
                                {{ Form::file('image',array('class' => 'form-control', 'name'=>'image')) }}
                            @endif
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