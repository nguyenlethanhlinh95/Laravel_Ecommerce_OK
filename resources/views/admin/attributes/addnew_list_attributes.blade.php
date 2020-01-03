@extends('layout.admin.master')

@section('header')
    Attributes
@endsection

{{--@section('css')--}}
    {{--<link rel="stylesheet" href="{{ 'assets/admin/css/bootstrap.css' }}">--}}
{{--@endsection--}}

@section('content')
@section('header')
    Attributes
@endsection
<div class="row" id="wapper_page_attributes">
    <div class="col-lg-4">
        <h5>Add new attribute</h5>
        <p>Attributes let you define extra product data, such as size or color. You can use these attributes in the shop sidebar using the "layered nav" widgets.</p>
        {!! Form::open(['route'=> 'attribute.store', 'method' => 'post']) !!}
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" required name="name">
        </div>

        <input type="submit" value="Add attribute" class="btn btn-primary">
        {{ Form::close() }}
    </div>

    <div class="col-lg-8">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Terms</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $att)
                    <tr>
                        <td>
                            <a href="#">{{ $att->name }}</a>
                            <div>
                                <a href="{{ route('attribute.edit', ['id'=>$att->id]) }}">Edit</a> |
                                <a class="red" href="{{ route('attribute.show', ['id'=>$att->id]) }}">Delete</a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a href="{{ route('items_list_attributes', ['id'=>$att->id]) }}">Configure terms</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection