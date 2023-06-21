@extends('layouts.app')
@section('content')



<div class="d-flex justify-content-center">
    <h4>★いいね一覧★</h4>
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
        @foreach($good as $gooditem)

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$gooditem->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $gooditem->product_name}}</h5>
                <p class="card-text">{{ $gooditem->money}}円</p>
            </div>
        </div>

        @endforeach

    </div>
</div>



@endsection