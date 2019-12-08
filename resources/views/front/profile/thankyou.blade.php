@extends('layout.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li></li>
                    <li class="active"></li>
                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
                </ol>
            </div><!--/breadcrums-->

            <div class="row">

            </div>



        </div>
    </section>
@stop