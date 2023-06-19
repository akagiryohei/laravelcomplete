@extends('layouts.app')
@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">いいね一覧</div>
                <div class="card-body">
                    <table class='table'>
                        <tbody>
                            @foreach($good as $gooditem)
                            <tr>
                                <th><img src="{{ asset('public/'.$gooditem->img) }}" alt="代替テキスト" widht="5%"><th>
                                <th scope='col'>{{ $gooditem->product_name}}</th>
                                <th scope='col'>{{ $gooditem->money}}</th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <p>
                        <a href="{{ route('userprofile.index') }}">お客様情報に戻る</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection