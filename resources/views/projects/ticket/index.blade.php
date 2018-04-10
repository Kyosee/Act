@extends('projects.ticket._default')
@section('head')
    <title>购票</title>
    <style>
        .pay{
            font-size: 100px;
        }
    </style>
@endsection
@section('content')
    <a href="#" class="pay user-pay">支付</a>
    <a href="ticket" class="pay">我的票</a>
    <script type="text/javascript" charset="utf-8">
        $(".user-pay").click(function(event) {
            $.ajax({
                url: 'subOD',
                type: 'post',
                success: function(data){
                    if(data.status === 1){
                        WeixinJSBridge.invoke(
                            'getBrandWCPayRequest', JSON.parse(data.json),
                            function(res){
                                if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                                    location.href = 'success';
                                }
                            }
                        );
                    }else{
                        alert('下单失败请稍后重试')
                    }
                }
            })
        });
    </script>
@endsection
