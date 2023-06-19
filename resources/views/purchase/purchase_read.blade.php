@extends('layouts.app')
@section('content')








<div class="d-flex justify-content-center">
    <h4>★カート一覧★</h4>
</div>

<div class="d-flex flex-row-reverse bd-highlight">
    <div class="p-2 bd-highlight">
        <button type="button" class="btn btn-primary">
            <a href="{{ route('users.edit',['user' =>$user_id]) }}" class="link-light">購入ページへ</a>
        </button>
        <button type="button" class="btn btn-success">
            <a href="{{ route('userprofile.index') }}" class="link-light">お客様情報に戻る</a>
        </button>
    </div>
</div>


<div class="container">
    <div class="d-flex justify-content-center flex-sm-wrap">
        @foreach($purshasepluslist as $purchaseitem)

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$purchaseitem->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $purchaseitem->product_name}}</h5>
                <p class="card-text">{{ $purchaseitem->money}}円</p>
                <p class="card-text">{{ $purchaseitem->quantity}}個</p>
                <p class="card-text">
                <form action="{{ route('purchases.destroy',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                </form>
                </p>
                <p class="card-text">
                <form action="{{ route('purchases.update',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="-" class="btn btn-primary" name="minus">
                </form>
                </p>

                <p class="card-text">
                <form action="{{ route('purchases.update',['purchase' =>$purchaseitem->id])}}" method="post" class="float-right">
                    @csrf
                    @method('PATCH')
                    <input type="submit" value="+" class="btn btn-success" name="plus">
                </form>
                </p>
            </div>
        </div>

        @endforeach

    </div>
</div>





@endsection