<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable  = ['user_id','product_id','purchase_flg','money','quantity'];

    public $timestamps = false;

}
