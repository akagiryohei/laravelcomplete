@extends('layouts.app')
@section('content')

<div class="container">

    <div class="p-3 mb-2 bg-primary text-white rounded-start">
        <h2>健康の森</h2>
    </div>


    <!-- 検索する条件をgetで送信する -->
    <form action="{{ route('welcome.index')}}" method="GET">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <input type='text' class='form-control' name="search" value="@if (isset($search)) {{ $search }} @endif" />
            </div>
            <div class="p-2 bd-highlight">
                <select class="my_class" name="min">
                    <option value="">選択してください</option>
                    <option value="1000">1000円</option>
                    <option value="3000">3000円</option>
                    <option value="5000">5000円</option>
                    <option balue="10000">10000円</option>
                </select>
            </div>
            <div class="p-2 bd-highlight">
                <h5>~</h5>
            </div>
            <div class="p-2 bd-highlight">
                <select class="my_class" name="max">
                    <option value="">選択してください</option>
                    <option value="1000">1000円</option>
                    <option value="3000">3000円</option>
                    <option value="5000">5000円</option>
                    <option balue="10000">10000円</option>
                </select>
            </div>
            <div class="p-2 bd-highlight">
                <th><button type='submit' class='btn btn-primary'>検索</button></th>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-between flex-sm-wrap">
        @foreach($product as $products)

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$products->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $products['product_name']}}</h5>
                <p class="card-text">{{ $products['money']}}</p>
                <a href="{{ route('generalnologin.edit',['generals' =>$products['id']]) }}" class="btn btn-primary">商品詳細</a>
            </div>
        </div>
        @endforeach

    </div>

</div>


@endsection