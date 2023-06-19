<?php

// ルートの宣言

use Illuminate\Support\Facades\Route;

// 使うcontrollerの宣言

use App\Http\Controllers\GoodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PurchasePluscontroller;
use App\Http\Controllers\UserPlusController;
use App\Http\Controllers\AdminPlusController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserprofileController;
use App\Http\Controllers\GoodIndexController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GeneralNologinController;
use App\Http\Controllers\PurchaseUpdateController;
use App\Http\Controllers\PurchaseUpdatePlusController;
use App\Http\Controllers\LoginIndexController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'WelcomeController@index')->name('welcome.index');



Auth::routes();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');


Route::resource('generals', 'GeneralController');
Route::get('/generalnon/{generals}/edit',[GeneralNologinController::class,'edit'])->name('generalnologin.edit');

Route::get('loginindex',[LoginIndexController::class, 'index'])->name('loginindex.index');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    //productの登録をするためのページへのルート

    
    
});


Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::resource('products', 'ProductController');
    Route::resource('useradmins', 'UserAdminController');
    Route::resource('admins', 'AdminPlusController');
});
Route::group(['middleware' => ['auth', 'can:general_only']], function () {
    Route::resource('goods', 'GoodController');
    Route::resource('purchases', 'PurchaseController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('users', 'UserController');
    Route::resource('purchaseplus', 'PurchasePluscontroller');
    Route::resource('userplus', 'UserPlusController');
    Route::get('userprofiles',[UserprofileController::class, 'index'])->name('userprofile.index');
    Route::post('ajaxgood', 'GeneralController@ajaxgood')->name('products.ajaxgood');
    Route::get('goodindexs',[GoodIndexController::class, 'index'])->name('goodindex.index');
    Route::post('/purchaseupdate/{purchaseupdates}/update',[PurchaseUpdateController::class,'update'])->name('purchaseupdate.update');
    Route::resource('purchaseupdateplus', 'PurchaseUpdatePlusController');



});
