<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreatePurchase;




//modelの宣言
use App\Product;
use App\Purchase;
use App\Review;
use App\User;
use App\Good;


class GeneralNologinController extends Controller
{
    public function edit($id)
    {
        $product = new Product;

        $result = $product->find($id);

        $review = new Review;


        $reviewlist = $review->where('product_id', $id)->get();

        // dd($reviewlist);
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $good_model = new Good;

        return view('/general/general_form_nologin', [

            'result' => $result,
            'review' => $reviewlist,
            'good_model' => $good_model,

        ]);
    }

}
