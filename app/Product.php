<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable  = ['product_name','money','img','explanation'];

    public $timestamps = false;
}
