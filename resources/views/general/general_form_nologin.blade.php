@extends('layouts.app')
@section('content')

<div class='row justify-content-center'>

    <div class="card mb-3" style="max-width: 50%;">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <img src="{{ asset('public/'.$result->img) }}" alt="代替テキスト">
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h4 class="card-title">{{ $result['product_name']}}</h4>
                    <p class="card-text">{{ $result['explanation']}}</p>
                    <p class="card-text"><small class="text-muted">{{ $result['money']}}円</small></p>
                </div>
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