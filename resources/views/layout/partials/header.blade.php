<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
    <title>Free Home Shoppe Website Template | Home :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('css')
    <link href="assets/front/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="assets/front/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="assets/front/css/mystyle.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/toastr.min.css">

    <script type="text/javascript" src="assets/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/front/js/move-top.js"></script>
    <script type="text/javascript" src="assets/front/js/easing.js"></script>
    <script type="text/javascript" src="assets/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/front/js/startstop-slider.js"></script>




</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call">
                <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
            </div>
            <div class="account_desc">
                @include('layout.partials.topMenu')
            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="{{ route('index') }}"><img src="assets/front/images/logo.png" alt="" /></a>
            </div>
            <div class="cart">
                @if (Cart::count() > 0)
                    <p>Welcome to our Online Store! <span><a href="{{ route('cart') }}">Cart:</a></span><div id="dd" class="wrapper-dropdown-2"> {{ Cart::count() }} item(s) - {{ Cart::total() . 'VND' }}
                        <ul class="dropdown">
                            <li>you have {{ Cart::count() }} items in your Shopping cart</li>
                        </ul></div></p>
                    @else
                    <p>Welcome to our Online Store! <span><a href="{{ route('cart') }}">Cart:</a></span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00
                        <ul class="dropdown">
                            <li>you have no items in your Shopping cart</li>
                        </ul></div></p>
                    @endif

            </div>
            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });

            </script>
            <div class="clear"></div>
        </div>
        <div class="header_bottom">
            <div class="menu">
                @include('layout.partials.mainMenu')
            </div>
            <div class="search_box">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>