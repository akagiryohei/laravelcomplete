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


class PurchasePlusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product;
        $purchase = new Purchase;
        $user_id = Auth::user()->id;
        $purchaseall = $purchase->all()->toArray();
        $purchaselist = $purchase->where('purchase_flg',1)->where('user_id',$user_id)->get();

        
        $list = DB::table('products')
        ->select('products.img','products.product_name','products.money','purchases.purchase_flg','purchases.quantity','purchases.user_id','purchases.created_at')
        ->join('purchases','products.id','=','purchases.product_id')
        ->get();

        $purshasepluslist=$list->where('purchase_flg',1)->where('user_id',$user_id);

        
        // dd($purshasepluslist);
        // //製品名の表示をするために行動--------------------
        // $product_id_list=[];
        // foreach($purchaselist as $purchaseitem){
        //     $product_id = $purchaseitem->product_id;
        //     array_push($product_id_list,$product_id);
        // }
        // // dd($product_id_list);
        // $product_id_list;
        // //---------------------------------------------
        return view('purchase/purchase_purchase', [
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
    public function update(Request $request, $id)
    {
        //
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
