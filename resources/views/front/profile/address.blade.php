@extends('layout.master')

@section('content')
    <section id="orders">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('profile.password_get') }}">Password</a></li>
                    <li class="active"> My Password</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="row">
                @include('front.profile.menu')
                <div class="col-md-8">
                    <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Address</h3>

                    <div class="wapper_changePass container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Thay đổi địa chỉ</h3>
                                {!! Form::open(['route'=> 'profile.address_post', 'method' => 'post']) !!}
                                {{--@foreach($address_data as $value)--}}
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input value="{{$address_data->fullname}}" class="form-control" type="text" name="fullname" >
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <input value="{{ $address_data->city  }}" class="form-control" type="text" name="city" placeholder="City">
                                    </div>

                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input value="{{ $address_data->pincode }}" class="form-control" type="text" name="pincode" placeholder="Pincode">
                                    </div>

                                    <input type="submit" value="Submit" class="btn btn-primary">
                                {{--@endforeach--}}
                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@stop