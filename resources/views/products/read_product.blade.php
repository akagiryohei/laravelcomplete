@extends('layouts.app')
@section('content')

@foreach($product as $products)

<table class='table'>
    <tbody>
        <tr>
            <th scope='col'>{{ $products['product_name']}}</th>
            <th scope='col'>{{ $products['money']}}</th>
            <img src="{{ asset('public/'.$products->img) }}" alt="代替テキスト" widht="5%">
            <th scope='col'>
                <form action="{{ route('products.destroy',$products->id)}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="論理削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                </form>
                <a href="{{ route('products.edit',['product' =>$products['id']]) }}">商品編集</a>
            </th>
        </tr>
    </tbody>
</table>

@endforeach



@endsection