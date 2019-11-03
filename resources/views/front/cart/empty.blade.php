@extends('layout.master')

@section('css')
    <link href="assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <img src="{{ asset('images/emptycart.png') }}" alt="">

                <h5 class="bold">Sorry !! You're cart empty.</h5>
                <br>
                <h5><a href="{{ route('home') }}">Back to Homepage</a></h5>
            </div>
        </div>
    </div>
@stop

