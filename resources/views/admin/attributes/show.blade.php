@extends('layout.admin.master')

@section('header')
    Show Product
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if ($att != null)
            <div class="">
                {!! Form::model($att, ['method'=>'Delete', 'action'=> ['AttributesController@destroy', $att->id]]) !!}
                <div>
                    <p>Are you deleting?</p>

                    <input type="submit" value="OK" class="btn btn-warning">

                    <a href="{{ route('attribute.index') }}" class="btn btn-primary">Cancel</a>
                </div>
                <br>
                {!! Form::close() !!}
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Detail item Attributes
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Attributes name</label>
                                <input value="{{ $att->name  }}" class="form-control" required name="name" placeholder="Name">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            Is empty
        @endif

    </div>
</div>
@endsection