@extends('layouts.app')
@section('content')

<h2>一般&&非ログイン者向けページ</h2>
<a href="{{ route('home')}}">トップ画面へ</a>

<!-- 検索する条件をgetで送信する -->
<form action="{{ route('generals.index')}}" method="GET" >
    <input type='text' class='form-control' name="search" value="@if (isset($search)) {{ $search }} @endif"/>
    
    <select class="my_class" name ="min">
    <option value="">選択してください</option>
        <option value="1000">1000円</option>
        <option value="3000">3000円</option>
        <option value="5000">5000円</option>
        <option balue="10000">10000円</option>
    </select>
    <h5>~</h5>
    <select class="my_class" name ="max">
        <option value="">選択してください</option>
        <option value="1000">1000円</option>
        <option value="3000">3000円</option>
        <option value="5000">5000円</option>
        <option balue="10000">10000円</option>
    </select>

    <div class='row justify-content-center'>
        <th><button type='submit' class='btn btn-primary'>検索</button></th>
    </div>
</form>

@foreach($product as $products)

<table class='table'>
    <tbody>
        <tr>
            <th scope='col'>{{ $products['product_name']}}</th>
            <th scope='col'>{{ $products['money']}}</th>
            <img src="{{ asset('public/'.$products->img) }}" alt="代替テキスト" widht="5%">
            <th scope='col'>
                <a href="{{ route('purchases.edit',['purchase' =>$products['id']]) }}">商品詳細</a>
            </th>
            
        </tr>
    </tbody>
</table>

@if($good_model->good_exist(Auth::user()->id,$products->id))
<p class="favorite-marke">
  <a class="js-good-toggle loved" href="" data-productid="{{ $products->id }}"><i class="fas fa-heart">いいねありがとう</i></a>
</p>
@else
<p class="favorite-marke">
  <a class="js-good-toggle" href="" data-productid="{{ $products->id }}"><i class="fas fa-heart">いいねしましょう</i></a>
</p>
@endif



@endforeach

<script type="text/javascript">
    
    $(function () {
    var good = $('.js-good-toggle');
    var goodProductId;

    good.on('click', function () {
        console.log('クリックイベント発火');

        var $this = $(this);
        goodProductId = $this.data('productid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxgood',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'product_id': goodProductId //コントローラーに渡すパラメーター
            },
        })

            // Ajaxリクエストが成功した場合
            .done(function (data) {
                //lovedクラスを追加
                $this.toggleClass('loved');

                //.goodsCountの次の要素のhtmlを「data.postgoodsCount」の値に書き換える
                $this.next('.goodsCount').html(data.productGoodsCount);
                console.log("ajax通信完了");

            

            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
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
      .loved{
    color: red !important;
  }
</style>




@endsection