@extends('layout.admin.master')

@section('header')
    Show Product
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="fomr">
            {!! Form::model($page, ['method'=>'Delete', 'action'=> ['PageController@destroy', $page->id]]) !!}
                <div>
                    <p>Are you deleting?</p>


                    <input type="submit" value="OK" class="btn btn-warning">


                    <a href="{{ route('page.index') }}" class="btn btn-primary">Cance</a>
                </div>
            <br>
            {!! Form::close() !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail page
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Page title</label>
                            <input value="{{ $page->title  }}" class="form-control" required minlength="5" name="pro_name" placeholder="Prodcut name">
                        </div>

                        <div class="form-group">
                            <label>Page content</label>
                            <textarea id="editor" class="form-control" name="pro_code" placeholder="Prodcut code">
                                {{ $page->content }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            <br>
                            @if($page->image != null)
                                <img class="card-img-top img-fluid" src="{{ 'images/pages'}}{{ $page->image }} " style="width:100px; height: 70px" alt="Card image cap">
                            @endif
                        </div>


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
    </script>
@stop