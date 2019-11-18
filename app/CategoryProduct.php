<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'category_products';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug', 'description', 'parent_id' ];


    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
