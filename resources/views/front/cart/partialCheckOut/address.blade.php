<h3 class="title mgt-20 mgbt-20">Shopper Infomation</h3>

{!! Form::open(['route'=> 'checkout.addressValidate', 'method' => 'post', 'class'=> 'mgt-20']) !!}
{{--<form class="mgt-20">--}}
    <div class="form-group">
        <label class="bold mgbt-5" for="fullName">Name</label>
        <input type="text" class="form-control" value="{{ old('fullName') }}" name="fullName" id="fullName" aria-describedby="Your full Name" placeholder="Enter full name">
        <span style="color:red">{{ $errors->first('fullName') }}</span>
        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    </div>

    <div class="form-group">
        <label class="bold mgbt-5" for="address">Address</label>
        <input type="text" class="form-control" value="{{ old('address') }}" name="address" id="address" aria-describedby="Your Address" placeholder="Enter Address">
        <span style="color:red">{{ $errors->first('address') }}</span>
        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    </div>

    <div class="form-group">
        <label class="bold mgbt-5" for="email">Email</label>
        <input type="text"  value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Email">
        <span style="color:red">{{ $errors->first('email') }}</span>
    </div>

    {{--<div class="form-group">--}}
        {{--<label class="bold mgbt-5" for="pinCode">Pin code</label>--}}
        {{--<input type="text" class="form-control" value="{{ old('pinCode') }}" name="pinCode" id="pinCode" aria-describedby="Your pincode" placeholder="Enter pincode">--}}
        {{--<span style="color:red">{{ $errors->first('pinCode') }}</span>--}}
        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label class="bold mgbt-5" for="city">City</label>--}}
        {{--<input type="text" value="{{ old('city') }}" class="form-control" name="city" id="city" placeholder="city">--}}
        {{--<span style="color:red">{{ $errors->first('city') }}</span>--}}
    {{--</div>--}}

    <div class="form-group">
        <label class="bold mgbt-5" for="userName">User Name</label>
        <input type="email" value="{{ old('userName') }}" class="form-control" name="userName" id="userName" placeholder="User Name">
        <span style="color:red">{{ $errors->first('userName') }}</span>
    </div>



    {{--<div class="form-group">--}}
        {{--<label class="bold mgbt-5" for="street">Street</label>--}}
        {{--<input type="text" value="{{ old('street') }}" class="form-control" name="street" id="street" placeholder="Street">--}}
        {{--<span style="color:red">{{ $errors->first('street') }}</span>--}}
    {{--</div>--}}



    {{--<div class="form-group">--}}
        {{--<label class="bold mgbt-5" for="zip">Zip</label>--}}
        {{--<input type="text" value="{{ old('zip') }}" class="form-control" name="zip" id="zip" placeholder="Zip">--}}
        {{--<span style="color:red">{{ $errors->first('zip') }}</span>--}}
    {{--</div>--}}

    <div class="form-group">
        <label class="bold mgbt-5" for="password">Password</label>
        <input type="password" value="{{ old('password') }}" class="form-control" name="password" id="password" placeholder="Password">
        <span style="color:red">{{ $errors->first('password') }}</span>
    </div>

    <div class="form-group">
        <label class="bold mgbt-5" for="rePassword">Confirm Password</label>
        <input type="password" value="{{ old('rePassword') }}" class="form-control" name="rePassword" id="rePassword" placeholder="Confirm Password">
        <span style="color:red">{{ $errors->first('rePassword') }}</span>
    </div>

    <div class="form-group">
        <span><input type="radio" name="pay" value="COD" checked="checked" />COD </span>
        <span><input type="radio" name="pay" value="paypal" />Paypal </span>
    </div>

    <button type="submit" class="btn btn-primary">Continue</button>

    <div class="form-group">
        <div class="row mgt-40">
            <div class="col-md-6 col-sm-12">
                <a href="#">Back to basket</a>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="#">Choose delivery method</a>
            </div>
        </div>
    </div>
{{ Form::close() }}