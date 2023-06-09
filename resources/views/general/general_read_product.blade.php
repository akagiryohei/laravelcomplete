@extends('layouts.app')
@section('content')

<h2>一般&&非ログイン者向けページ</h2>
<a href="{{ route('home')}}">トップ画面へ</a>

<!-- 検索する条件をgetで送信する -->
<form action="{{ route('generals.index')}}" method="GET" >
    <input type='text' class='form-control' name="search" value="@if (isset($search)) {{ $search }} @endif"/>
    
    <select class="my_class" name ="min">
    <option value="">選択してください</option>
        <option value="1000">1000円</option>
        <option value="3000">3000円</option>
        <option value="5000">5000円</option>
        <option balue="10000">10000円</option>
    </select>
    <h5>~</h5>
    <select class="my_class" name ="max">
        <option value="">選択してください</option>
        <option value="1000">1000円</option>
        <option value="3000">3000円</option>
        <option value="5000">5000円</option>
        <option balue="10000">10000円</option>
    </select>

    <div class='row justify-content-center'>
        <th><button type='submit' class='btn btn-primary'>検索</button></th>
    </div>
</form>

@foreach($product as $products)

<table class='table'>
    <tbody>
        <tr>
            <th scope='col'>{{ $products['product_name']}}</th>
            <th scope='col'>{{ $products['money']}}</th>
            <img src="{{ asset('public/'.$products->img) }}" alt="代替テキスト" widht="5%">
            <th scope='col'>
                <a href="{{ route('purchases.edit',['purchase' =>$products['id']]) }}">商品詳細</a>
            </th>
        </tr>
    </tbody>
</table>

@endforeach




@endsection