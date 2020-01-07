@extends('layout.admin.master')

@section('header')
    Create Product
@endsection

@section('content')
@section('header')
    Update product
@endsection
<div class="row" id="product_create">
    {{--{!! Form::open(['route'=> 'product.update', 'method' => 'PATCH', 'files'=> 'true' ]) !!}--}}
    {!! Form::model($pro, ['method'=>'PATCH', 'files'=> 'true' , 'action'=> ['ProductsController@update', $pro->id]]) !!}

    <div class="col-lg-9">
        <div class="">
            <p><a href="{{ route('product.index') }}">Back List product</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Update product
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product name</label>
                            <input value="{{ $pro->pro_name }}" class="form-control" name="pro_name" placeholder="Product name">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="editor" type="text" class="form-control" name="content" placeholder="Content">
                            {!! $pro->content !!}
                            </textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4>
                                    <span>Product data</span>
                                </h4>
                            </div>

                            {{--tabs--}}
                            @include('layout.admin.partials.product.tabs_detail', compact('sizes','sizes_product', 'pro'))
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select value ="{{ old('id_category') }}" name="id_category" class="form-control">
                                {{--<option value="0" >Chọn</option>--}}
                                @foreach($categories as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product short description</label>
                            <textarea id="editor1" type="text" class="form-control" name="description" placeholder="Description">
                            {!! $pro->description !!}
                            </textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">

        <div class="">
            <div class="panel panel-default panel_custom">
                <div class="panel-heading">
                    <span>Đăng</span>
                    <span class="icon_right">
                            <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                        </span>

                </div>
                <div class="panel-body">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </div>

        <div class="">
            <div class="panel panel-default panel_custom">
                <div class="panel-heading">
                    <span>Product image</span>
                    <span class="icon_right">
                            <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                        </span>

                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <img width="75px" height="75px" src="images/{{ $pro->image }}" alt="{{ $pro->pro_name }}">
                        {{ Form::file('image',array('class' => 'form-control', 'name'=>'image')) }}
                    </div>
                </div>
            </div>
        </div>

        {{ Form::close() }}

    </div>
    @endsection

    @section('js')
        <script>
            var editor = CKEDITOR.replace( 'editor' );
            var editor1 = CKEDITOR.replace( 'editor1' );
        </script>
@stop



