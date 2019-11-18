@extends('layout.admin.master')

@section('header')
    Detail post
@endsection

@section('content')
@section('header')
    Detail post
@endsection
<div class="row">
    <div class="col-lg-12">

        <div class="">
            <p><a href="{{ route('post.index') }}">Back List post</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail post
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($post, ['method'=>'PATCH', 'files'=> 'true' , 'action'=> ['PostsController@update', $post->id]]) !!}
                        {{--{{ method_field('PUT') }}--}}
                        <div class="form-group">
                            <label>Title</label>
                            <input value="{{ $post->name ? : old('name') }}" class="form-control" required name="name" placeholder="Category name">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input value="{{ $post->slug ? : old('slug') }}" class="form-control" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input value="{{ $post->description ? : old('description') }}" class="form-control" name="description" placeholder="Prodcut price">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="editor1" class="form-control" name="content" placeholder="Content">
                                {{ $post->content ? : old('content') }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="0" >Chọn</option>
                                @foreach($categories as $key  => $value)
                                    <option value="{{ $value }}"
                                        @if($value == old('category_id', $post->category_id)) {{ "selected" }}
                                        @endif
                                        >{{ $key }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            <br>
                            @if($post->image == "posts/news_null.png")
                                <img class="card-img-top img-fluid" src="{{ 'images/'}}{{ $post->image }}" style="width:100px; height: 70px; object-fit: contain" alt="Card image cap">
                            @else
                                <img class="card-img-top img-fluid" src="{{ 'images/'}}{{ $post->image }}" style="width:100px; height: 70px; object-fit: contain" alt="Card image cap">
                            @endif
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