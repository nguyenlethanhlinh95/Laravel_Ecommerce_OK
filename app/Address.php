<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'fullname', 'email', 'country', 'city', 'address', 'payment_type', 'pincode', 'state', 'user_id'];
}
