<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreatePurchase;
use App\Http\Requests\CreateUser;
//modelの宣言
use App\Product;
use App\Purchase;
use App\Review;
use App\User;
use Carbon\Carbon;


use Illuminate\Http\Request;

class UserController extends Controller
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = new User;



        // $userauth = $user->where('id', $id)->get();

        $userauth = $user->all()->toArray();
        $name = "";

        foreach ($userauth as $userrecode) {
            if ($userrecode['id'] == $id) {
                $name = $userrecode['name'];
                break;
            }
        }
        // dd($name);

        $user_id = Auth::user()->id;

        $list = DB::table('products')
            ->select('products.img', 'products.product_name', 'products.money', 'purchases.purchase_flg', 'purchases.quantity', 'purchases.user_id', 'purchases.created_at', 'purchases.id')
            ->join('purchases', 'products.id', '=', 'purchases.product_id')
            ->get();

        $purshasepluslist = $list->where('purchase_flg', 0)->where('user_id', $user_id);
        // dd($purshasepluslist);

        //中身のissetで見るのではなく、foreachで回してそのうちの１つの要素を見る
        foreach ($purshasepluslist as $purshaseitem) {
            if ($purshaseitem->purchase_flg == 0) {
                return view('/purchase/purchase_form', [
                    'user_id' => $id,
                    'userindex' => $name,
                ]);
            }
        }

        return view('purchase/purchase_read', [
            'user_id' => $user_id,
            'purshasepluslist' => $purshasepluslist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUser $request, $id)
    {
        $user = new User;
        $day = now();
        $purchase = new Purchase;



        $user_id = Auth::user()->id;

        // $purchaselist = $purchase->find()->toArray();
        // where('purchase_flg',0)
        $purchaselist = $purchase->where('purchase_flg', 0)->get();
        // $purchase_flgbox=[];
        foreach ($purchaselist as $purchaseitem) {
            // dd($purchaselist[$id-1]);
            $id = $purchaseitem['id'];
            // dd($id);
            $purchasedata = $purchase->find($id);
            // $purchasetest = $purchase
            $purchasedata->purchase_flg = $purchaseitem['purchase_flg'] = 1;
            $purchasedata->created_at = $purchaseitem['created_at'] = Carbon::now();
            $purchasedata->updated_at = $purchaseitem['updated_at'] = Carbon::now();


            // array_push($purchase_flgbox, $purchase_flgitem);
            $purchasedata->save();
        }


        $userauth = $user->find($user_id);

        $columns = ['name', 'phone_number', 'postcode', 'prefecture_id'];
        foreach ($columns as $column) {
            $userauth->$column = $request->$column;
        }

        $userauth->save();

        return view('/purchase/purchase_complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $delpurchase = $purchase->find($id);
        // dd($purchase);



        // dd($useritem);

        $user->delete();
        return view('welcome');

        //一覧画面に遷移する

    }
}
