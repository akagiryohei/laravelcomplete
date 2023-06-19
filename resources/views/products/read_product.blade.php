@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h4>商品編集</h4>
</div>

<div class="d-flex flex-row-reverse bd-highlight">
    <div class="p-2 bd-highlight">
        <button type="button" class="btn btn-success">
            <a href="{{ route('home') }}" class="link-light">事業者専用画面トップ画面</a>
        </button>
    </div>
</div>

<div class="container">
    <div class="d-flex justify-content-center flex-sm-wrap">
        @foreach($product as $products)

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$products->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $products['product_name']}}</h5>
                <p class="card-text">{{ $products['money']}}円</p>

                <p class="card-text">
                <form action="{{ route('products.destroy',$products->id)}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="非表示" class="btn btn-danger" name="destroy" onclick='return confirm("削除しますか？");'>
                </form>
                </p>
                <p class="card-text">

                <form action="{{ route('products.destroy',$products->id)}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="表示" class="btn btn-success" name="resurrection">
                </form>
                </p>
                <p class="card-text">
                    <button type="button" class="btn btn-primary ">
                        <a href="{{ route('products.edit',['product' =>$products['id']]) }}" class="link-light">商品編集</a>
                    </button>
                </p>
            </div>
        </div>

        @endforeach

    </div>
</div>




@endsection