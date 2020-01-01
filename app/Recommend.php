<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    //
    protected $table = "recommends";
    protected $fillable = ['uid', 'pro_id'];
}
