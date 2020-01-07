<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $fillable = ['title','slug', 'content', 'image', 'user_id' ];
}
