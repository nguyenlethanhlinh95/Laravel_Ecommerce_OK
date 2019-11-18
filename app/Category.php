<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug', 'description', 'parent_id' ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }


}
