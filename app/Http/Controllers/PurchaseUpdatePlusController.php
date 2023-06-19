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

class PurchaseUpdatePlusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePurchase $request, $id)
    {
        $product = new Product;
        $purchase = new Purchase;
        $user = new User;

        $purchasedata = $purchase->find($id);



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
