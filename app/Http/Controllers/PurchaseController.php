<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//modelの宣言
use App\Product;
use App\Purchase;


class purchaseitem
{
    public  $img = '';
    public  $money = 0;
    public  $product_name = '';

    public $product_id = '';

    public $quantity = 0;

    public $id = 0;

    function init()
    {
        $this->img = '';
        $this->money = 0;
        $this->product_name = '';
        $this->product_id = '';
        $this->quantity = 0;
        $this->id = 0;
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
            $item->id = $purchaserecord['id'];
            $item->quantity = $purchaserecord['quantity'];
            $item->product_id = $purchaserecord['product_id'];
            $item->money = $purchaserecord['money'];
            array_push($purchaselist, $item);
        }
        // dd($purchaselist);




        return view('puchase/puchase_read', [
            'purchaselist' => $purchaselist,
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
        $product = new Product;

        $result = $product->find($id);

        return view('/general/general_form_product', [

            'result' => $result,

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

        
        if (isset($request->plus)) {
            
            $purchasedata=$purchase->find($id);
            

            $quantitydata=$purchasedata->quantity;
            
            $purchasedata->quantity = $quantitydata + 1;


            $purchasedata->save();

            return redirect(route('purchases.index'));
        }

        if (isset($request->minus)) {
            
            $purchasedata=$purchase->find($id);
            

            $quantitydata=$purchasedata->quantity;
            
            $purchasedata->quantity = $quantitydata - 1;


            $purchasedata->save();

            return redirect(route('purchases.index'));




        }



        //カートへ登録するときの内容
        if (isset($request->quantity)) {


            // 今のIDに合致するデータを取得
            $productdata = $product->find($id);

            //user_idはとりあえず手動
            $purchase->user_id = 1;
            $purchase->product_id = $id;
            $purchase->purchase_flg = 0;
            $purchase->money = $productdata->money;
            $purchase->quantity = $request->quantity;


            $purchase->save();
            return redirect(route('generals.index'));
        }
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
