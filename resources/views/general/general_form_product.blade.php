@extends('layouts.app')
@section('content')
<div class='row justify-content-center'>

    <div class="card mb-3" style="max-width: 640px;">
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
                <!-- エラー文表示 -->
                <div class='panel-body'>
                    @if($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-header">{{ __('個数') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('purchaseupdateplus.update',['purchaseupdateplu' => $result['id']]) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">個数</label>
                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('カートへ追加') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-header">{{ __('レビュー') }}</div>
                <div class="card-body">
                    <form action="{{ route('reviews.update',['review' => $result['id']]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">レビュー</label>
                            <div class="col-md-6">
                                <input id="comment" type="text" class="form-control" name="comment" value="">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('レビュー投稿') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <p>
                    <a href="{{ route('generals.index') }}">トップページへ戻る</a>
                </p>
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
</div>
<!-- ーーーーーーーーーーーーーーーーーーーーーーーー -->






@endsection