<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Purchase;
use App\Product;
use App\Review;
use App\User;
use App\Good;


class WelcomeController extends Controller
{
    public function index(Request $request)
    {

        //検索フォームで入力された値で取得する
        // inputの中身はviewのformで設定したname?

        $product = Product::paginate(20);
        $search = $request->input('search');

        //クエリビルダ
        $query = Product::query();

        $min = $request->min;
        $max = $request->max;
        // dd($min);
        if(isset($max) && isset($min)){
            $query = $query->whereBetween('money', [$min, $max]);
            
        }
        // dd($query);
        
        if($search){
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される:複数のカラムに対してはorwherで対処可能
            foreach($wordArraySearched as $value) {
                $query =$query->where(function($query) use ($value){
                $query->where('product_name', 'like', '%'.$value.'%')
                ->orWhere('explanation', 'like', '%'.$value.'%');
                });

            }
            
            // 上記で取得した$queryをページネートにし、変数$usersに代入
            
        }
            // dd($query->toSql());
        // $product = $query->paginate(20);
        $product = $query->where('del_flg', 0)->get();

        // $id = Auth::user->id;
        // $result = $product->find($id);

        // dd($product);

        // dd(isset($request));
        // 検索するときの中身があればそのままそれに沿って検索
        // ないときは全件表示
        // if (isset($request) == true && $request !== "") {
        //     $product_all = $product->where('product_name','=','$request')->orwhere('explanation','=','$request')->get();
            
        // } else {

        //     //何もない場合の全件表示：
        // $product_all = $product->where('del_flg', 0)->get();
        // }

        $data = [];

        $good_model = new Good;

        return view('welcome', [
            // 'product' => $product_all,
            'product' => $product,
            'search' =>$search,
            'good_model' => $good_model,

        ]);
    }

}
