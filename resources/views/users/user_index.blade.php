@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザーー覧</div>
                <div class="card-body">
                    @foreach($user as $users)
                    <p>
                        <th scope='col'>ユーザー名：{{ $users['name']}}</th>
                    </p>
                    @endforeach
                    <button type="button" class="btn btn-success">
                        <a href="{{ route('home') }}" class="link-light">事業者専用画面トップ画面</a>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection