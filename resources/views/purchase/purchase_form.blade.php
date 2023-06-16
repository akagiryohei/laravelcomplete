@extends('layouts.app')
@section('content')



<h4>★購入ページ★</h4>

<form action="{{ route('users.update',['user' =>$user_id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for='name' class='mt-2'>氏名</label>
    <input type='text' class='form-control' name='name' id='name' value="{{ $userindex }}" />
    <label for='phone_number' class='mt-2'>電話番号</label>
    <input type='text' class='form-control' name='phone_number' id='phone_number' value="" />
    <label for='postcode' class='mt-2'>郵便番号</label>
    <input type='text' class='form-control' name='postcode' id='postcode' value="" />
    <label for='prefecture_id' class='mt-2'>住所</label>
    <input type='text' class='form-control' name='prefecture_id' id='prefecture_id' value="" />

    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
    </div>
</form>

<!-- 商品表示予定地 -->


@endsection