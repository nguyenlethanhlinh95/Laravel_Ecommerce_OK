<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsAttribute extends Model
{
    //
    protected $table = 'items_attributes';
    protected $primaryKey = 'id';
    protected $fillable = ['attributes_id', 'name'];
}
