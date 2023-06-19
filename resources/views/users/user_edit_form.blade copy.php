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

                <div class="card-header">{{ __('★お客様情報更新★') }}</div>
                <div class="card-body">
                    <form action="{{ route('userplus.update',['userplu' =>$user->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user['name'] }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $user['email'] }}" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">電話番号</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user['phone_number'] }}" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">郵便番号</label>
                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $user['postcode'] }}" autofocus>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="prefecture_id" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <input id="prefecture_id" type="text" class="form-control" name="prefecture_id" value="{{ $user['prefecture_id'] }}" autofocus>
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input class="btn btn-success" type="submit" value="お客様情報更新" onclick='return confirm("変更しますか？");'>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{ route('userprofile.index') }}" class="link-light">お客様情報に戻る</a>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>




@endsection