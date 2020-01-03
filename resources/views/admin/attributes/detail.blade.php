@extends('layout.admin.master')

@section('header')
    Detail Attributes
@endsection

@section('content')
@section('header')
    Detail Attributes
@endsection
<div class="row">
    <div class="col-lg-12">

        <div class="">
            <p><a href="{{ route('attribute.index') }}">Back List Items Attributes</a></p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Items Attributes
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::model($att, ['method'=>'PATCH', 'action'=> ['AttributesController@update', $att->id]]) !!}
                        {{--{{ method_field('PUT') }}--}}
                        <div class="form-group">
                            <label>Category name</label>
                            <input value="{{ $att->name }}" class="form-control" required name="name" placeholder="Category name">
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