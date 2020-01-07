<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Mockery\Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['pro_name', 'pro_code','id_category', 'pro_price', 'spl_price', 'image', 'description', 'content', 'stock'];

    public function categories()
    {
        return $this->belongsToMany('App\CategoryProduct', 'category_products', 'id_category', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\CategoryProduct', 'id_category', 'id');
    }

    public function item_attributes()
    {
        return $this->belongsToMany('App\ItemsAttribute','items_attribute_product','product_id','items_attribute_id');
    }

}

