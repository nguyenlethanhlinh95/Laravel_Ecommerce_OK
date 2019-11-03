@include('layout.partials.header')


<div class="header_slide">
    <?php
    $routeName = Route::current()->getName();
    ?>
    @if ($routeName == 'home' ||  $routeName == 'index' || $routeName == 'shop')

        <div class="header_bottom_left">
            @include('layout.partials.categories')
        </div>

        @include('layout.partials.slide')
    @endif

    <div class="clear"></div>
</div>
</div>
<div class="main">
    <div class="content">
        @yield('content')
    </div>
</div>
</div>


@include('layout.partials.footer')