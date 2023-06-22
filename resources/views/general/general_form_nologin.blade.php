@extends('layouts.app')
@section('content')


<div class="container">
    <div class="d-flex justify-content-center flex-sm-wrap">

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$result->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $result['product_name']}}</h5>
                <p class="card-text">{{ $result['explanation']}}</p>
                <p class="card-text">{{ $result['money']}}円</p>
            </div>
        </div>


    </div>
</div>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メニュー') }}</div>
                <div class="card-body">
                    
                        <div class="form-group row">

                            <label for="quantity" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success">
                                    <a type="submit" href="{{ route('login')}}" class="link-light">商品購入へ</a>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <a type="submit" href="{{ url('/')}}" class="link-light">トップページへ戻る</a>
                                </button>
                            </div>
                        </div>
                </div>
                <div class="card-header">{{ __('レビュー一覧') }}</div>
                <div class="card-body">
                    @foreach($review as $reviews)

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>
                        <div class="col-md-6">
                            <th scope='col'>{{ $reviews['title']}}</th>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">コメント</label>
                        <div class="col-md-6">
                            <th scope='col'>{{ $reviews['comment']}}</th>
                            <p>-----------------------------------------------------</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection