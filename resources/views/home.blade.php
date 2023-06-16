@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <p>
                        <a href="{{ route('generals.index') }}">トップ画面</a>
                    </p>
                    <p>
                    <p>
                        <a href="{{ route('userplus.edit',['userplu' =>$user_id]) }}">ユーザー情報編集</a>
                    </p>

                    <p>
                        <a href="{{ route('admins.index') }}">事業者専用画面トップ画面</a>
                    </p>


                    <p>
                    <form action="{{ route('users.destroy',['user' =>$user_id])}}" method="post" class="float-right">
                        @csrf
                        @method('delete')
                        <input type="submit" value="退会ボタン" class="btn btn-danger" onclick='return confirm("退会しますか？");'>
                    </form>
                    </p>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection