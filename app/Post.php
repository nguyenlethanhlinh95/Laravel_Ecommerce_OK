<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug', 'content' , 'description', 'category_id','image', 'created_at', 'updated_at' ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
