@extends('layout.master')

@section('css')
    <style>
        .images_1_of_4 img{
                height: 300px;
                width: 100%;
                object-fit: contain;
        }
    </style>
@endsection

@section('content')

@if (isset($newProduct))
    <div class="content_top">
        <div class="heading">
            <h3>New Products</h3>
        </div>
        <div class="see">
            <p><a href="#">See all Products</a></p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section group">
            @foreach($newProduct as $item)
                <div class="grid_1_of_4 images_1_of_4">
                <a href="{{ route('product_view_detail', ['id'=> $item->id, 'name'=> $item->pro_name]) }}"><img src="images/{{ $item->image }}" alt="{{ $item->pro_name }}" /></a>
                <h2>{{ $item->pro_name }} </h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">{{ $item->pro_price }} VND</span></p>
                    </div>
                    <div class="add-cart">
                        <h4><a href="{{ route('addItemCart', ['id'=>$item->id]) }}">Add to Cart</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            @endforeach
    </div>
@endif

<div class="content_bottom">
    <div class="heading">
        <h3>Feature Products</h3>
    </div>
    <div class="see">
        <p><a href="#">See all Products</a></p>
    </div>
    <div class="clear"></div>
</div>
<div class="section group">
    <div class="grid_1_of_4 images_1_of_4">
        <a href="preview.html"><img src="assets/front/images/new-pic1.jpg" alt="" /></a>
        <h2>Lorem Ipsum is simply </h2>
        <div class="price-details">
            <div class="price-number">
                <p><span class="rupees">$849.99</span></p>
            </div>
            <div class="add-cart">
                <h4><a href="preview.html">Add to Cart</a></h4>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="grid_1_of_4 images_1_of_4">
        <a href="preview.html"><img src="assets/front/images/new-pic2.jpg" alt="" /></a>
        <h2>Lorem Ipsum is simply </h2>
        <div class="price-details">
            <div class="price-number">
                <p><span class="rupees">$599.99</span></p>
            </div>
            <div class="add-cart">
                <h4><a href="preview.html">Add to Cart</a></h4>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="grid_1_of_4 images_1_of_4">
        <a href="preview.html"><img src="assets/front/images/new-pic4.jpg" alt="" /></a>
        <h2>Lorem Ipsum is simply </h2>
        <div class="price-details">
            <div class="price-number">
                <p><span class="rupees">$799.99</span></p>
            </div>
            <div class="add-cart">
                <h4><a href="preview.html">Add to Cart</a></h4>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="grid_1_of_4 images_1_of_4">
        <a href="preview.html"><img src="assets/front/images/new-pic3.jpg" alt="" /></a>
        <h2>Lorem Ipsum is simply </h2>
        <div class="price-details">
            <div class="price-number">
                <p><span class="rupees">$899.99</span></p>
            </div>
            <div class="add-cart">
                <h4><a href="preview.html">Add to Cart</a></h4>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@stop