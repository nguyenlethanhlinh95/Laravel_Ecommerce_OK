@extends('layout.admin.master')

@section('header')
    Create Post
@endsection

@section('content')
    @section('header')
        Create Post
    @endsection
    <div class="row">
        <div class="col-lg-12">

            <div class="">
                <p><a href="{{ route('post.index') }}">Back List post</a></p>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Create post
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route'=> 'post.store', 'method' => 'post', 'files'=> 'true' ]) !!}
                                <div class="form-group">
                                    <label>Post title</label>
                                    <input class="form-control" required minlength="5" name="name" placeholder="Post title">
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" placeholder="Slug">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" placeholder="Description">
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="editor1" class="form-control" name="content" placeholder="Content"></textarea>
                                </div>


                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="0" >Chọn</option>
                                    @foreach($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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

@section('js')
    <script>
        var editor = CKEDITOR.replace( 'editor' );
        var editor1 = CKEDITOR.replace( 'editor1' );
    </script>
@stop