@extends('layout.master')

@section('content')
    <section id="orders">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li class="active"> My Order</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="row">
                @include('front.profile.menu')
                <div class="col-md-8">
                    <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Orders</h3>

                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Product name</th>
                                <th>Product Code</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td>{{ucwords($order->pro_name)}}</td>
                                <td>{{$order->pro_code}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@stop