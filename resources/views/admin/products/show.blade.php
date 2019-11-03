@extends('layout.admin.master')

@section('header')
    Show Product
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="">
            {!! Form::model($pro, ['method'=>'Delete', 'action'=> ['ProductsController@destroy', $pro->id]]) !!}
                <div>
                    <p>Are you deleting?</p>


                    <input type="submit" value="OK" class="btn btn-warning">


                    <a href="{{ route('product.index') }}" class="btn btn-primary">Cance</a>
                </div>
            <br>
            {!! Form::close() !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail product
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
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

                            @else
                                <img class="card-img-top img-fluid" src="{{ 'images/image_null.jpg'}}" style="width:100px; height: 70px" alt="Card image cap">

                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection