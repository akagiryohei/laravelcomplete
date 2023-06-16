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
                        <th scope='col'>{{ $users['name']}}</th>
                    </p>
                    @endforeach
                    <p>
                        <a href="{{ route('admins.index') }}">事業者専用画面トップ画面へ戻る</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection