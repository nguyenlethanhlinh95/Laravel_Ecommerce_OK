@extends('layout.admin.master')

@section('header')
    Create Product
@endsection

@section('content')
    @section('header')
        Create product
    @endsection
    <div class="row">
        {!! Form::open(['route'=> 'product.store', 'method' => 'post', 'files'=> 'true' ]) !!}

        <div class="col-lg-9">

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
                                <div class="form-group">
                                    <label>Product name</label>
                                    <input value="{{ old('pro_name') }}" class="form-control" required minlength="5" name="pro_name" placeholder="Prodcut name">
                                </div>

                                <div class="form-group">
                                    <label>Product code</label>
                                    <input value="{{ old('pro_code') }}" class="form-control" name="pro_code" placeholder="Prodcut code">
                                </div>

                                <div class="form-group">
                                    <label>Product price</label>
                                    <input value="{{ old('pro_price') }}" class="form-control" name="pro_price" placeholder="Prodcut price">
                                </div>

                                <div class="form-group">
                                    <label>Product discount price</label>
                                    <input value="{{ old('spl_price') }}" class="form-control" name="spl_price" placeholder="Prodcut discount price">
                                </div>

                                <div class="form-group">
                                    <label>Product Stock</label>
                                    <input value="{{ old('stock') }}" class="form-control" name="stock" placeholder="Prodcut stock">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select value ="{{ old('id_category') }}" name="id_category" class="form-control">
                                        <option value="0" >Chọn</option>
                                        @foreach($categories as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="editor" type="text" value="{{ old('content') }}"  class="form-control" name="content" placeholder="Content">

                                    </textarea>
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="editor1" type="text" value="{{ old('description') }}" class="form-control" name="description" placeholder="Description">
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



