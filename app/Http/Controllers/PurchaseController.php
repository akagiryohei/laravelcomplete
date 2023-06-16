<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



//modelの宣言
use App\Product;
use App\Purchase;
use App\Review;
use App\User;
use App\Good;




class purchaseitem
{
    public  $img = '';
    public  $money = 0;
    public  $product_name = '';

    public $product_id = '';

    public $quantity = 0;

    public $id = 0;

    public $purchase_flg = 0;


    function init()
    {
        $this->img = '';
        $this->money = 0;
        $this->product_name = '';
        $this->product_id = '';
        $this->quantity = 0;
        $this->id = 0;
        $this->purchase_flg = 0;
    }
}

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $product = new Product;
        $purchase = new Purchase;
        $user_id = Auth::user()->id;

        $product_all = $product->all()->toArray();
        $purchase_all = $purchase->all()->toArray();
        // dd($product_all);
        $purchaselist = array();
        foreach ($purchase_all as $purchaserecord) {
            $item = new purchaseitem;
            $product_id = $purchaserecord['product_id'];
            foreach ($product_all as $productrecord) {
                if ($product_id == $productrecord['id']) {
                    $item->product_name = $productrecord['product_name'];
                    $item->img = $productrecord['img'];
                }
            }
            $item->purchase_flg = $purchaserecord['purchase_flg'];
            $item->id = $purchaserecord['id'];
            $item->quantity = $purchaserecord['quantity'];
            $item->product_id = $purchaserecord['product_id'];
            $item->money = $purchaserecord['money'];
            array_push($purchaselist, $item);
        }

        $list = DB::table('products')
            ->select('products.img', 'products.product_name', 'products.money', 'purchases.purchase_flg', 'purchases.quantity', 'purchases.user_id', 'purchases.created_at', 'purchases.id')
            ->join('purchases', 'products.id', '=', 'purchases.product_id')
            ->get();

        $purshasepluslist = $list->where('purchase_flg', 0)->where('user_id', $user_id);

        // dd($purchaselist);






        // foreach($purchaselist as $purchaseitem){
        //     dd($purchaseitem);

        // }




        return view('purchase/purchase_read', [
            'purchaselist' => $purchaselist,
            'user_id' => $user_id,
            'purshasepluslist' => $purshasepluslist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/products/insert_product');
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
        $product = new Product;

        $result = $product->find($id);

        $review = new Review;


        $reviewlist = $review->where('product_id', $id)->get();

        // dd($reviewlist);
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $good_model = new Good;

        return view('/general/general_form_product', [

            'result' => $result,
            'review' => $reviewlist,
            'good_model' => $good_model,

        ]);
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
        $product = new Product;
        $purchase = new Purchase;
        $user = new User;

        $purchasedata = $purchase->find($id);

        if (isset($request->plus)) {

            $quantitydata = $purchasedata->quantity;

            $purchasedata->quantity = $quantitydata + 1;


            $purchasedata->save();

            return redirect(route('purchases.index'));
        }

        if (isset($request->minus) && $purchasedata->quantity > 1) {

            // dd($purchasedata->quantity);


            $quantitydata = $purchasedata->quantity;

            $purchasedata->quantity = $quantitydata - 1;


            $purchasedata->save();

            return redirect(route('purchases.index'));
        }

        //カートへ登録するときの内容
        if (isset($request->quantity)) {


            // 今のIDに合致するデータを取得
            $productdata = $product->find($id);

            //user_idはとりあえず手動
            $purchase->user_id = Auth::user()->id;
            $purchase->product_id = $id;
            $purchase->purchase_flg = 0;
            $purchase->money = $productdata->money;
            $purchase->quantity = $request->quantity;


            $purchase->save();
            return redirect(route('generals.index'));
        }

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        // $delpurchase = $purchase->find($id);
        // dd($purchase);


        $purchase->delete();

        //一覧画面に遷移する
        return redirect(route('purchases.index'));
    }
}
