@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop

@section('content')
    <div class="container-fluid">
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

@stop

