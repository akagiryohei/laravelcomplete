@extends('layouts.app')
@section('content')

<div class="container">

    <div class="p-3 mb-2 bg-success  text-white rounded-start">
        <h2>健康の森</h2>
    </div>

    <!-- 検索する条件をgetで送信する -->
    <form action="{{ route('generals.index')}}" method="GET">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <input type='text' class='form-control' name="search" value="@if (isset($search)) {{ $search }} @endif" />
            </div>
            <div class="p-2 bd-highlight">
                <select class="my_class" name="min">
                    <option value="">選択してください</option>
                    <option value="1000">1000円</option>
                    <option value="3000">3000円</option>
                    <option value="5000">5000円</option>
                    <option balue="10000">10000円</option>
                </select>
            </div>
            <div class="p-2 bd-highlight">
                <h5>~</h5>
            </div>
            <div class="p-2 bd-highlight">
                <select class="my_class" name="max">
                    <option value="">選択してください</option>
                    <option value="1000">1000円</option>
                    <option value="3000">3000円</option>
                    <option value="5000">5000円</option>
                    <option balue="10000">10000円</option>
                </select>
            </div>
            <div class="p-2 bd-highlight">
                <th><button type='submit' class='btn btn-primary'>検索</button></th>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-between flex-sm-wrap">
        @foreach($product as $products)

        <div class="card" style="width: 18rem;">
            <img src="{{ asset('public/'.$products->img) }}" class="card-img-top" alt="代替テキスト">
            <div class="card-body">
                <h5 class="card-title">{{ $products['product_name']}}</h5>
                <p class="card-text">{{ $products['money']}}</p>
                <a href="{{ route('purchases.edit',['purchase' =>$products['id']]) }}" class="btn btn-primary">商品詳細</a>
                <p class="card-text">
                    @if($good_model->good_exist(Auth::user()->id,$products->id))
                <p class="favorite-marke">
                    <a class="js-good-toggle loved" href="" data-productid="{{ $products->id }}"><i class="fas fa-heart">いいね</i></a>
                </p>
                @else
                <p class="favorite-marke">
                    <a class="js-good-toggle" href="" data-productid="{{ $products->id }}"><i class="fas fa-heart">いいね</i></a>
                </p>
                @endif
                </p>
            </div>
        </div>

        @endforeach

    </div>


    <script type="text/javascript">
        $(function() {
            var good = $('.js-good-toggle');
            var goodProductId;

            good.on('click', function() {
                console.log('クリックイベント発火');

                var $this = $(this);
                goodProductId = $this.data('productid');
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/ajaxgood', //routeの記述
                        type: 'POST', //受け取り方法の記述（GETもある）
                        data: {
                            'product_id': goodProductId //コントローラーに渡すパラメーター
                        },
                    })

                    // Ajaxリクエストが成功した場合
                    .done(function(data) {
                        //lovedクラスを追加
                        $this.toggleClass('loved');

                        //.goodsCountの次の要素のhtmlを「data.postgoodsCount」の値に書き換える
                        $this.next('.goodsCount').html(data.productGoodsCount);
                        console.log("ajax通信完了");



                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function(data, xhr, err) {
                        //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                        //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                        console.log('エラー');
                        console.log(err);
                        console.log(xhr);
                    });

                return false;
            });
        });
    </script>

    <style>
        .loved {
            color: red !important;
        }
    </style>




    @endsection