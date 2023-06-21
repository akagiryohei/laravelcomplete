<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateProduct;


use App\Product;

use Illuminate\Support\Facades\Auth;
use App\Purchase;
use App\Review;
use App\User;
use Carbon\Carbon;
use App\Good;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //事業者専用画面商品リスト
    public function index(Request $request)
    {


        $product = new Product;
        $product_all = $product->get();


        
        // dd($product_all);
        return view('products/read_product', [
            'product' => $product_all,
        ]);

        // $product= Item::all();

        // return view('product.index',[
        //     'product' => $product,
        // ]);

    }
    public function indexgood()
    {
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $products = Product::withCount('good')->orderBy('created_at', 'desc')->paginate(10);
        $good_model = new Good;

        $data = [
                'products' => $products,
                'good_model'=>$good_model,
            ];

        return view('products.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('/products/insert_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {

        $product = new Product;

        $columns = ['product_name', 'money', 'explanation'];
        foreach ($columns as $column) {
            $product->$column = $request->$column;
        }

        //画像は後で登録
        //画像の追加するためのコード
        //Linux環境用
        // $original = request()->file('img');
        // dd(request());
        // request()->file('img')->storeAs('', $original, 'public');
        // $product->img = $original;

        //windows環境用
        $original = request()->file('img')->getClientOriginalName();
        $name = date('Ymd_His') . '_' . $original;
        request()->file('img')->move('public/', $name);
        $product->img = $name;



        $product->save();
        // return redirect(route('products.index'));
        return redirect(route('admins.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, Request $request)
    {
        $product = new Product;

        $result = $product->find($id);

        return view('/products/edit_form_product', [

            'result' => $result,

        ]);
    }

    public function producteditdate(int $id)
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
        $instance = new Product;
        $record = $instance->find($id);

        $columns = ['product_name', 'money', 'explanation'];

        foreach ($columns as $column) {
            $record->$column = $request->$column;
        }

        // $original = request()->file('img');
        // request()->file('img')->storeAs('', $original, 'public');
        // $record->img = $original;

        // $originalimg = request()->file('img');
        
        if(isset($request->img)){

            // dd($originalimg);
            
            
            
            
            $original = request()->file('img')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            request()->file('img')->move('public/', $name);
            $record->img = $name;
        }




        //画像は後で登録
        //画像の追加するためのコード

        $record->save();

        return redirect(route('admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Request $request,$id)

    {

        $product= new Product;
        $productdate=$product->find($id);

        if (isset($request->destroy)) {

            $productdate['del_flg'] = 1;
            $productdate->save();
            return redirect(route('admins.index'));
            
        }
        
        if(isset($request->resurrection))
        
        $productdate['del_flg'] = 0;
        $productdate->save();
        //一覧画面に遷移する
        return redirect(route('admins.index'));

        
    }
}
