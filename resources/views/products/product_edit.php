@extends('layouts.app')
@section('content')


<h4>商品編集</h4>

@foreach($product as $products)

<table class='table'>
    <tbody>
        <tr>
            <th scope='col'>{{ $products['product_name']}}</th>
            <th scope='col'>{{ $products['money']}}</th>
            <img src="{{ asset('public/'.$products->img) }}" alt="代替テキスト" widht="5%">
            <th scope='col'>
                <a href="{{ route('products.edit',['product' =>$products['id']]) }}">商品編集</a>
            </th>
        </tr>
    </tbody>
</table>

@endforeach



@endsection