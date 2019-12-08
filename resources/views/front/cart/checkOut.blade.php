@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop

@section('content')
    <section class="hero hero-page gray-bg padding-small">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">You currently have {{ $cartDao->getCartCount()  }} item(s) in your basket</p>
                </div>
                <ul class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
                    <li class="breadcrumb-item"><a href="{{ route('home')  }}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $count =1;?>
                    @foreach($getAllCartItems as $cartItem)
                        <tr id="{{ $cartItem->rowId }}">
                            <td class="cart_product">
                                <a href="{{ route('product_view_detail', ['name'=> $cartItem->name ,'id'=>$cartItem->id]) }}">
                                    <img src="images/{{$cartItem->options->img}}" alt="" width="200px">
                                </a>
                            </td>
                            {!! Form::open(['url'=> route("updateItemCart") , 'method' => 'put']) !!}
                            <td class="cart_description">
                                <h4><a href="{{ route('product_view_detail', ['name'=> $cartItem->name ,'id'=>$cartItem->id]) }}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>Product ID: {{$cartItem->id}}</p>
                                <p>Only {{$cartItem->options->stock}} left</p>
                            </td>

                            <td class="cart_price">
                                <p>{{$cartItem->price}} VNĐ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                                    <input class="cartItemEvent" data-productID="{{ $cartItem->id }}" data-rowID="{{ $cartItem->rowId }}" type="number" min="1" max="1000" value="{{ $cartItem->qty }}"   />

                            {!! Form::close() !!}
                                </div>
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price">{{$cartItem->subtotal}} VNĐ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" style="background-color:red"
                                   href="{{ route('removeItemCart',['id'=>$cartItem->rowId])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <?php $count = 1;?>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 content_checkout">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#address">Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-toggle="tab" href="#delivery">Delivery Method</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-toggle="tab" href="#payment">Payment Method</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" data-toggle="tab" href="#review">Order Review</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="address">
                        @include('front.cart.partialCheckOut.address')
                    </div>
                    <div class="tab-pane container fade" id="delivery">.d..</div>
                    <div class="tab-pane container fade" id="payment">.p..</div>
                    <div class="tab-pane container fade" id="review">.r..</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 sidebar_checkout">
                <h4 class="bold">ORDER SUMMARY</h4>
                <p>Shipping and addtional costs are caculated based on values you have entered</p>

                <div class="wap mgt-20">
                    <div class="row mgbt-5">
                        <div class="col-md-8">
                            <span class="font">Order Subtotal</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <span class="bold">{{ $cartDao->getSubTotal() }} VNĐ</span>
                        </div>
                    </div>

                    <div class="row mgbt-5">
                        <div class="col-md-8">
                            <span class="font">Shipping and handling</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <span class="bold">$140</span>
                        </div>
                    </div>

                    <div class="row mgbt-5">
                        <div class="col-md-8">
                            <span class="font">Tax</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <span class="bold">{{ $cartDao->getTax() }} VNĐ</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <span class="font">Total</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <span class="bold total">{{ $cartDao->getTotal() }} VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('js')

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.cartItemEvent').change(function () {
                var value = $(this).val();
                if (value>0)
                {
                    var rowId = $(this).attr('data-rowID');
                    var proId = $(this).attr('data-productID');
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '{{ route('updateItemCart') }}',

                        //data: "qty=" + value + "& rowId=" + rowId + "& proId=" + proId,
                        data: { qty: value, rowId:rowId,  proId: proId},
                        success: function (response) {
                            var data = response.data;
                            var totalItem = data['qty'] * data['price'];
                            var totalListItems = response.total;
                            var subtotal = response.subtotal;
                            var tax = response.tax;

                            // update cart
                            $('#'+ data['rowId'] +' .cart_total_price').text(totalItem + " VND");
                            $('#dd span').text(totalItem + " VND");


                            $('#tax').text(tax + " VND");
                            $('#subtotal').text(subtotal + " VND");

                            //update total
                            $('.sidebar_checkout .total').text(totalListItems + " VND");
                        }
                    });
                }
                else
                {
                    alert('Quantity > 0 ');
                }
            })
        });
    </script>

@stop
@stop

