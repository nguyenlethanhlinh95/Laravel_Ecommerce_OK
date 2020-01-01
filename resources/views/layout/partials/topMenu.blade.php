<ul>
    @if(\Auth::check())
        <li><span>Xin chào </span> <span class="login_user">{{ \Auth::user()->name }}</span></li>
        <li><a href="{{ route('profile.index') }}">Profile</a></li>
        <li><a href="{{ route('profile.orders') }}">Orders</a></li>
        <li>
                <a href="{{ route('view_wishList') }}">Wishlist</a>
                <span>
                        <i style="color: #f19444" class="fa fa-star" aria-hidden="true"></i>
                        <span>@if ($count_wishlist != null) ({{ $count_wishlist }}) @endif</span>
                </span>
        </li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
        <li><a href="#">Delivery</a></li>
        <li><a href="{{ route('checkout') }}">Checkout </a></li>
        <li><a href="#">My Account</a></li>
    @else
        <li><a href="{{ url('/register') }}">Register</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
    @endif

</ul>