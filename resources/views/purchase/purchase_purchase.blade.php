@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h4>★購入一覧★</h4>
</div>

<div class="d-flex flex-row-reverse bd-highlight">
    <div class="p-2 bd-highlight">
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
                <p class="card-text">{{ $purchaseitem->created_at}}</p>
            </div>
        </div>

        @endforeach

    </div>
</div>

@endsection