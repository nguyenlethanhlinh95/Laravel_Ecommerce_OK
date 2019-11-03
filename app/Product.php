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
    protected $fillable = ['pro_name', 'pro_code', 'pro_price', 'spl_price', 'image', 'description', 'content'];

}

