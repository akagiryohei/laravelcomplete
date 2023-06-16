@extends('layouts.app')
@section('content')
<!-- <h4>★商品情報★</h4> -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品情報</div>

                <div class="card-body">
                    <p>
                        <a href="{{ route('products.create') }}">商品登録</a>
                    </p>
                    <p>
                        <a href="{{ route('products.index') }}">商品編集 && 商品一覧 && 商品非表示と表示設定</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お客様情報</div>

                <div class="card-body">
                    <p>
                        <a href="{{ route('useradmins.index') }}">お客様一覧</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection