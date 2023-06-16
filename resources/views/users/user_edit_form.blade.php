@extends('layouts.app')
@section('content')




<h4>★ユーザー情報編集★</h4>

<form action="{{ route('userplus.update',['userplu' =>$user->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for='name' class='mt-2'>ユーザー名</label>
    <input type='text' class='form-control' name='name' id='name' value="{{ $user['name'] }}" />
    <label for='prefecture_id' class='mt-2'>メールアドレス</label>
    <input type='text' class='form-control' name='email' id='email' value="{{$user['email']}}" />
    <label for='phone_number' class='mt-2'>電話番号</label>
    <input type='text' class='form-control' name='phone_number' id='phone_number' value="{{$user['phone_number']}}" />
    <label for='postcode' class='mt-2'>郵便番号</label>
    <input type='text' class='form-control' name='postcode' id='postcode' value="{{$user['postcode']}}" />
    <label for='prefecture_id' class='mt-2'>住所</label>
    <input type='text' class='form-control' name='prefecture_id' id='prefecture_id' value="{{$user['prefecture_id']}}" />

    <div class='row justify-content-center'>
        <!-- <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button> -->
        <input type="submit" value="変更" class='btn btn-primary w-25 mt-3' onclick='return confirm("変更しますか？");'>

    </div>
</form>




@endsection