<div class="categories">
    <ul>
        <h3>Categories product</h3>
        @foreach($getCategoryProductViewShare as $item)
            <li><a href="#">{{ $item->name }}</a></li>
        @endforeach
    </ul>
</div>