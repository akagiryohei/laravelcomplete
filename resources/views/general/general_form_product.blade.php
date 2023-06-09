@extends('layouts.app')
@section('content')

<label for='product_name'>商品名</label>
<th scope='col'>{{ $result['product_name']}}</th>
<label for='money' class='mt-2'>金額</label>
<th scope='col'>{{ $result['money']}}</th>
<label for='img' class='mt-2'>画像</label>
<p>現在のデータ</p>
<img src="{{ asset('public/'.$result->img) }}" alt="代替テキスト" widht="5%">
<input type="file" class='form-control' name="img" id='img' value="{{ $result['img']}}"><!--仮画像リンク-->

<label for='explanation' class='mt-2'>商品説明文</label>
<th scope='col'>{{ $result['explanation']}}</th>
<!-- 画像は後で登録 -->

<form action="{{ route('purchases.update',['purchase' => $result['id']]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for='quantity'>個数</label>
    <input type='text' class='form-control' name='quantity' id='quantity' value="" />

    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>カートへ追加</button>
    </div>
</form>
@endsection