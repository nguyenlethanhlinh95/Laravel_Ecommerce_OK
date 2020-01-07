@extends('layout.admin.master')

@section('header')
    Edit Page <span><a href="{{ route('page.create') }}">Add new</a></span>
@endsection

@section('content')
@section('header')
    Edit Page
@endsection
<div class="row">
    {!! Form::model($page, ['method'=>'POST', 'action'=> ['ProductsController@update', $page->id], 'files'=>true]) !!}
    <div class="col-lg-9">

        <div class="">
            <p><a href="{{ route('page.index') }}">Back List page</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Page
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Page title</label>
                            <input value="{{ $page->title }}" class="form-control" required name="name" placeholder="Page title">
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input value="{{ $page->slug }}" class="form-control" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="editor" class="form-control" name="content" placeholder="Content">
                                {{ $page->content }}
                            </textarea>
                        </div>

                        {{--<div class="form-group">--}}
                        {{--{{ Form::label('image', 'Image') }}--}}
                        {{--{{ Form::file('image',array('class' => 'form-control', 'name'=>'image')) }}--}}
                        {{--</div>--}}

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
                    <span>Featured Image</span>
                    @if ($page->image != null)
                        <div class="">
                            <img src="{{ $page->image }}" alt="{{ $page->title }}">

                        </div>
                    @endif
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
    </div>

    {{ Form::close() }}
</div>
@endsection


@section('js')
    <script>
        var editor = CKEDITOR.replace( 'editor' );
    </script>
@stop