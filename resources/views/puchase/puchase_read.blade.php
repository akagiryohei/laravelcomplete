@extends('layouts.app')
@section('content')


@foreach($purchaselist as $purchaseitem)


<table class='table'>
    <tbody>
        <tr>
            <th scope='col'>{{ $purchaseitem->product_name}}</th>
            <th scope='col'>{{ $purchaseitem->money}}</th>
            <th scope='col'>{{ $purchaseitem->quantity}}</th>
            <th scope='col'>
                <form action="{{ route('purchases.update',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="+" class="btn btn-danger" name="plus">
                </form>
            </th>
            <th scope='col'>
                <form action="{{ route('purchases.update',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="-" class="btn btn-danger" name="minus">
                </form>
            </th>


            <img src="{{ asset('public/'.$purchaseitem->img) }}" alt="代替テキスト" widht="5%">

            <th scope='col'>
                <form action="{{ route('purchases.destroy',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                </form>
            </th>

        </tr>
    </tbody>
</table>
@endforeach




@endsection