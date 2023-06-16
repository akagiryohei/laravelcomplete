$(function () {
    var good = $('.js-good-toggle');
    var goodProductId;

    good.on('click', function () {
        console.log('エラー');

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