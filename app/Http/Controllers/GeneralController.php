<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         //一般の表示

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
        return view('general/general_read_product', [
            // 'product' => $product_all,
            'product' => $product,
            'search' =>$search,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
