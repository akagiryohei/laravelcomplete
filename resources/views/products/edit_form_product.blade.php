@extends('layouts.app')
@section('content')

<!-- エラーメッセージ表示 -->
<div class='panel-body'>
    @if($errors->any())
    <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<form action="{{ route('products.update',['product' => $result['id']]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for='product_name'>商品名</label>
    <input type='text' class='form-control' name='product_name' id='product_name' value="{{ $result['product_name']}}" />
    <label for='money' class='mt-2'>金額</label>
    <input type='text' class='form-control' name='money' id='money' value="{{ $result['money']}}" />
    <label for='img' class='mt-2'>画像</label>
    <p>現在のデータ</p>
    <img src="{{ asset('public/'.$result->img) }}" alt="代替テキスト" widht="5%">

    <input type="file" class='form-control' name="img" id='img' value=""><!--仮画像リンク-->

    <label for='explanation' class='mt-2'>商品説明文</label>
    <textarea class='form-control' name='explanation'>{{ $result['explanation']}}</textarea>
    <!-- 画像は後で登録 -->
    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>編集登録</button>
    </div>

</form>

@endsection