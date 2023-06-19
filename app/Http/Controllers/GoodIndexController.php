<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Purchase;
use App\Product;
use App\Review;
use App\User;
use App\Good;


class GoodIndexController extends Controller
{
    public function index(Request $request)
    {
        $good = new Good;
        $user = new User;
        $user_id = Auth::user()->id;
        // $goodall = $good->find($user_id);
        $goodall = $good->where('user_id', $user_id)->get();

        // dd($goodall);

        $list = DB::table('products')
            ->select('products.img', 'products.product_name', 'products.money', 'goods.user_id','goods.product_id')
            ->join('goods', 'products.id', '=', 'goods.product_id')
            ->get();

        $goodsindexlist = $list->where('user_id', $user_id);



        // dd($userhuman->name);
        return view('goods/good_read', [
            'good' => $goodsindexlist,
        ]);
    }
}
