<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/7/2020
 * Time: 5:52 PM
 */
?>
@extends('layout.master')

@section('content')

    <div class="main">
        <div class="content">
            <div class="section group">
                <h2>{!! $about->title !!}</h2>
                
                <div class="center-block" style="text-align: center">
                    <img width="100%" height="400px" style="object-fit: contain" class="text-center center-block" src="images/pages/{{ $about->image }}" alt="{{ $about->title }}">
                </div>
                
                <div>
                    {!! $about->content !!}
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
