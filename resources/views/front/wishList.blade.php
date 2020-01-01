@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop

@section('content')

    <div class="container" id="wap_wishList">
        <div class="row">
            <div class="col-lg-12">
                <h2>My Wish List</h2>
            </div>
        </div>

        <div class="row table_wap">
            <div class="col-lg-12">
                @if ( $products == null)
                    <div class="center-block text-center">
                        <img src="{{ 'assets/front/images/NoWishlist.png' }}" alt="No Wishlist">
                        asd
                    </div>
                @else
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                        <tr class="text-center bold">
                            <td width="150px">Image</td>
                            <td width="350px">Product Name</td>
                            <td width="125px">Unit Price</td>
                            <td width="200px">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pro)
                            <tr class="text-center">
                                <td>
                                    <a href="{{ route('product_view_detail', ['id'=> $pro->id, 'name'=> str_slug($pro->pro_name) ])}}">
                                        <img style="width:75px; height:50px; object-fit: contain"   src="{{ 'images/' .$pro->image  }}" alt="{{ $pro->pro_name }}">
                                    </a>
                                </td>
                                <td>{{ $pro->pro_name }}</td>
                                <td>{{ $pro->pro_price }} VNĐ</td>
                                <td>
                                    <a href="{{ route('addItemCart', ['id'=>$pro->id]) }}">Add to cart</a> |
                                    <a href="{{ route('removeWishlist', ['id'=>$pro->id ]) }}">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>


@endsection