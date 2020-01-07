<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsAttribute extends Model
{
    //
    protected $table = 'items_attributes';
    protected $primaryKey = 'id';
    protected $fillable = ['attributes_id', 'name'];

    public function attribute()
    {
        return $this->belongsTo('App\Attributes', 'attributes_id','id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','items_attribute_product', 'items_attribute_id', 'product_id');
    }
}
