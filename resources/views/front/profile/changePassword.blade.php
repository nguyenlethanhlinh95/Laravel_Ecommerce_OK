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
                    <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Password</h3>

                    <div class="wapper_changePass container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Thay đổi mật khẩu</h3>
                                {!! Form::open(['route'=> 'profile.password_post', 'method' => 'post']) !!}
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input value="{{ old('old_password')  }}" class="form-control" type="password" name="old_password" placeholder="Mật khẩu cũ">
                                        <span style="color: red">{{ $errors->first('old_password') }}</span>
                                    </div>

                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input value="{{ old('new_password')  }}" class="form-control" type="password" name="new_password" placeholder="Mật khẩu mới">
                                    <span style="color: red">{{ $errors->first('new_password') }}</span>
                                </div>

                                <div class="form-group">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input value="{{ old('new_password_confirmation')  }}" class="form-control" type="password" name="new_password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                    <span style="color: red">{{ $errors->first('new_password_confirmation') }}</span>

                                </div>

                                <input type="submit" value="Submit" class="btn btn-primary">
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