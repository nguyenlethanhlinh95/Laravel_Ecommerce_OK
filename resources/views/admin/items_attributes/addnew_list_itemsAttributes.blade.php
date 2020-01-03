@extends('layout.admin.master')

@section('header')
    Item Attributes
@endsection

@section('content')
@section('header')
    Item Attributes
@endsection
<div class="row" id="wapper_page_attributes">
    <div class="col-lg-4">
        <h5>Attribute terms can be assigned to products and variations.</h5>
        <p>Note: Deleting a term will remove it from all products and variations to which it has been assigned. Recreating a term will not automatically assign it back to products.</p>
        {!! Form::open(['route'=> 'ItemsAttribute.store', 'method' => 'post']) !!}
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" required name="name">
            <input type="hidden" name="attributes_id" value="{{ $id }}">
        </div>

        <input type="submit" value="Add item attribute" class="btn btn-primary">
        {{ Form::close() }}
    </div>

    <div class="col-lg-8">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @if($items_attributes->isEmpty())
                    <tr>
                        <td>
                            No data found
                        </td>
                    </tr>
                @else
                    @foreach($items_attributes as $att)
                        <tr>
                            <td>
                                <a href="#">{{ $att->name }}</a>
                                <div>
                                    <a href="{{ route('ItemsAttribute.edit', ['id'=>$att->id]) }}">Edit</a> |
                                    <a class="red" href="{{ route('ItemsAttribute.show', ['id'=>$att->id]) }}">Delete</a>
                                </div>
                            </td>
                            {{--<td>--}}
                                {{--<div>--}}
                                    {{--<a href="{{ route('items_attributes', ['id'=>$att->id]) }}">Configure terms</a>--}}
                                {{--</div>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection