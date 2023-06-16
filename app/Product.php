<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;

class Product extends Model
{
    protected $fillable  = ['product_name','money','img','explanation'];

    public $timestamps = false;

    public function goods()
    {
        return $this->hasMany('App\Good');
    }

    public function isGoodby($user): bool{
        return Good::where('user_id',$user->id)->where('review_id',$this->id)->first() !==null;
    }
}
