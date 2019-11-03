<ul>
    @if(\Auth::check())
        <li><span>Xin chào </span> <span class="login_user">{{ \Auth::user()->name }}</span></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    @else
        <li><a href="{{ url('/register') }}">Register</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
    @endif

    <li><a href="#">Delivery</a></li>
    <li><a href="#">Checkout</a></li>
    <li><a href="#">My Account</a></li>
</ul>