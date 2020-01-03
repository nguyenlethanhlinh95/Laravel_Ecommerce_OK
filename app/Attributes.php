<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    //
    protected $table = 'attributes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
}
