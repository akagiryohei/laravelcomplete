@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-right">
        <div class="card">
            <div class="card-header">お客様情報</div>
            <div class="card-body">

                <p><label for='product_name'>ユーザー名</label></p>
                <th scope='col'>{{$user['name']}}</th>
                <p><label for='product_name'>メールアドレス</label></p>
                <th scope='col'>{{$user['email']}}</th>

                <p><label for='product_name'>電話番号</label></p>
                <th scope='col'>{{$user['phone_number']}}</th>

                <p><label for='product_name'>郵便番号</label></p>
                <th scope='col'>{{$user['postcode']}}</th>

                <p><label for='product_name'>住所</label></p>
                <th scope='col'>{{$user['prefecture_id']}}</th>
            </div>
        </div>
    </div>
</div>





<div class="container">
    <div class="row justify-content-left">
        <div class="card">
            <div class="card-header">お客様情報</div>
            <div class="card-body">

                <!-- いいね一覧設置予定 -->
                <p><a href="{{ route('purchases.index') }}">◆カート情報</a></p>
                <a href="{{ route('purchaseplus.index') }}">◆購入履歴</a>
            </div>
        </div>
    </div>
</div>






@endsection