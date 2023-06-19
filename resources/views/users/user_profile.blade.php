@extends('layouts.app')
@section('content')


<div class="d-flex bd-highlight">
    <div class="p-2 flex-fill bd-highlight">
        <div class="container">
            <div class="row justify-content-right">
                <div class="card">
                    <div class="card-header">お客様情報</div>
                    <div class="card-body">

                        <p><label for='product_name'>ユーザー名：{{$user['name']}}</label></p>
                        <p><label for='product_name'>メールアドレス：{{$user['email']}}</label></p>
                        <p><label for='product_name'>電話番号：{{$user['phone_number']}}</label></p>
                        <p><label for='product_name'>郵便番号：{{$user['postcode']}}</label></p>
                        <p><label for='product_name'>住所：{{$user['prefecture_id']}}</label></p>
                        <p>
                            <button type="submit" class="btn btn-primary">
                                <a class="link-light" href="{{ route('userplus.edit',['userplu' =>$user['id']]) }}">ユーザー情報編集</a>
                            </button>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="p-2 flex-fill bd-highlight">

        <div class="container">
            <div class="row justify-content-left">
                <div class="card">
                    <div class="card-header">お客様情報</div>
                    <div class="card-body">

                        <!-- いいね一覧設置予定 -->
                        <p><a class="link-success" href="{{ route('goodindex.index') }}">◆いいね一覧</a></p>
                        <p><a class="link-success" href="{{ route('purchases.index') }}">◆カート情報</a></p>
                        <p><a class="link-success" href="{{ route('purchaseplus.index') }}">◆購入履歴</a></p>
                        <form action="{{ route('users.destroy',['user' =>$user['id']])}}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="退会" class="btn btn-danger" onclick='return confirm("退会しますか？");'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</p>







@endsection