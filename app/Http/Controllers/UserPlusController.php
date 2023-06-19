<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateUserUpdate;

//modelの宣言
use App\Product;
use App\Purchase;
use App\Review;
use App\User;
use Carbon\Carbon;


class UserPlusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 事業者専用画面ユーザーリスト
    public function index(Request $request)
    {
        $user =new User;
        //データがすべて入ってる状況
        $userauth = $user->all()->toArray();
        return view('users/user_index', [
            'user' => $userauth,
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
        $user = new User;


        $userhuman = $user->find($id);


        // dd($userhuman);
        return view('users/user_edit_form', [
            'user' =>$userhuman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserUpdate $request, $id)
    {
        $user = new User;
        $record = $user->find($id);

        $columns = ['name', 'email', 'phone_number','postcode','prefecture_id'];

        foreach ($columns as $column) {
            $record->$column = $request->$column;
        }

        $record->save();


        

        return redirect(route('home'));


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
