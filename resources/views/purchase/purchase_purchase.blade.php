@extends('layouts.app')
@section('content')

<h4>★購入一覧★</h4>

<a href="{{ route('home') }}">ホーム画面へ</a></p>

@foreach($purshasepluslist as $purchaseitem)

<table class='table'>
    <tbody>
        <tr>
            <img src="{{ asset('public/'.$purchaseitem->img) }}" alt="代替テキスト" widht="5%">
            <th scope='col'>{{ $purchaseitem->product_name}}</th>
            <th scope='col'>{{ $purchaseitem->money}}</th>
            <th scope='col'>{{ $purchaseitem->quantity}}</th>
            <th scope='col'>{{ $purchaseitem->created_at}}</th>

        </tr>
    </tbody>
</table>
@endforeach
@endsection