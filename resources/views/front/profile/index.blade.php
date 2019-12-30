@extends('layout.master')

@section('content')
    <section id="orders">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li class="active"> My profile</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="row">
                @include('front.profile.menu')
                <div class="col-md-8">
                    <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your profile</h3>


                </div>
            </div>

        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@stop