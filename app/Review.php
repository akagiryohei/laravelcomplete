<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable  = ['title','comment','product_id','user_id'];

    public $timestamps = false;

}
