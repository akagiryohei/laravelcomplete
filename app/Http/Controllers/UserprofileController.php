<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//modelの宣言
use App\Product;
use App\Purchase;
use App\Review;
use App\User;
use Carbon\Carbon;



class UserprofileController extends Controller
{
    public function index(Request $request)
    {
        $user = new User;
        $user_id = Auth::user()->id;
        $userhuman = $user->find($user_id);
        
        //データがすべて入ってる状況
        $userauth = $user->all()->toArray();

        // dd($userhuman->name);
        return view('users/user_profile', [
            'user' => $userhuman,
        ]);
    }
}
