@extends('layouts.app')
@section('content')

<!-- エラーメッセージ表示 -->
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品登録ページ</div>
                <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for='product_name'>商品名</label>
                    <input type='text' class='form-control' name='product_name' id='product_name' value="{{ old('product_name')}}" />
                    <label for='money' class='mt-2'>金額</label>
                    <input type='text' class='form-control' name='money' id='money' value="{{ old('date')}}" />
                    <label for='img' class='mt-2'>画像</label>

                    <input type="file" class='form-control' name="img" id='img' value=""><!--仮画像リンク-->

                    <label for='explanation' class='mt-2'>商品説明文</label>
                    <textarea class='form-control' name='explanation'></textarea>
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>入力確定
                        </button>
                    </div>
                </form>
            </div>
            <button type="button" class="btn btn-success">
                <a href="{{ route('home') }}" class="link-light">事業者専用画面トップ画面</a>
            </button>

        </div>
    </div>
</div>
</div>


@endsection