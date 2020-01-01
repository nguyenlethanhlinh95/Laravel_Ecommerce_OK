<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 1/1/2020
 * Time: 3:57 PM
 */

?>

<div class="content_bottom">
    <div class="heading">
        <h3>Viewed products</h3>
    </div>
    <div class="see">
        <p><a href="#">See all Products</a></p>
    </div>
    <div class="clear"></div>
</div>
<div class="section group">
    @foreach($getRecommends as $recommend)
        <div class="grid_1_of_4 images_1_of_4">
            <a href="{{ route('product_view_detail', ['id'=> $recommend->pro_id, 'name'=> str_slug($recommend->pro_name) ]) }}"><img style="height: 150px;
    object-fit: contain;" src="images/{{$recommend->image}}" alt=""></a>
            <div class="price" style="border:none">
                <div class="add-cart" style="float:none">
                    <h2><a href="{{ route('product_view_detail', ['id'=> $recommend->pro_id, 'name'=> str_slug($recommend->pro_name) ]) }}">{{ $recommend->pro_name }}</a></h2>
                    <h4><a href="{{ route('product_view_detail', ['id'=> $recommend->pro_id, 'name'=> str_slug($recommend->pro_name) ]) }}">Detail</a></h4>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    @endforeach
</div>