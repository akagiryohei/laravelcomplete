<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CreateReview;



use App\Product;
use App\Purchase;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function update(CreateReview $request, $id)
    {
        $review = new Review;

        $purchase = new Purchase;

        // $purchase_all =$purchase->all()->toArray();

        //userが購入したもののリスト
        $purchaseuserlist = $purchase->where('user_id', Auth::user()->id)->where('purchase_flg', 1)->where('product_id', $id)->get();

        //  dd($purchaseuserlist->isEmpty());


        if ($purchaseuserlist->isEmpty()==false) {


            $columns = ['title', 'comment'];
            foreach ($columns as $column) {
                $review->$column = $request->$column;
            }

            $review->product_id = $id;
            $review->user_id = Auth::user()->id;

            $review->save();



            return redirect(route('generals.index',))->with('message','投稿完了');
        }

        return redirect(route('generals.index'))->with('message','購入してください');
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
