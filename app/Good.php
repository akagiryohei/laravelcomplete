<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Review::class);
    }

    public function good_exist($user_id, $product_id)
    {
        return Good::where('user_id', $user_id)->where('product_id', $product_id)->exists();
    }
}
