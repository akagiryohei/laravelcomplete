@extends('layouts.app')
@section('content')




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
                <div class="card-header">{{ __('★購入ページ★') }}</div>
                <div class="card-body">
                    <form action="{{ route('users.update',['user' =>$user_id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">氏名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $userhuman['name']}}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">電話番号</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $userhuman['phone_number']}}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">郵便番号</label>
                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $userhuman['postcode']}}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefecture_id" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <input id="prefecture_id" type="text" class="form-control" name="prefecture_id" value="{{ $userhuman['prefecture_id']}}" autofocus>
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-8">
                                <button type='submit' class='btn btn-primary '>購入完了</button>
                                <button type="button" class="btn btn-primary">
                                    <a type="submit" href="{{ route('purchases.index') }}" class="link-light">カートへ戻る</a>
                                </button>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
                <p>
                    <a href="{{ route('generals.index') }}">トップページへ戻る</a>
                </p>

            </div>
        </div>
    </div>
</div>
</div>



@endsection