@extends('projects.ticket._default')
@section('head')
    <title>{{ $project->project_name }}</title>
    <style>
        .pay{
            font-size: 100px;
        }
    </style>
@endsection
@section('content')
    <a href="ticket" style=" top: 0; right: 0; font-size: 16px; padding: 10px; color: #fff; position: absolute;z-index: 999">我的兑换</a>
    <img src="/images/projects/{{ $project->template->template_folder }}/bg.png" width="100%" height="100%" alt="">
    <div style="text-align: center; position: absolute; top: 0; height: 100%; width: 100%;z-index: 99">
        <img src="/images/projects/{{ $project->template->template_folder }}/btn.png" width="45%" class="user-pay" style="position: relative; top: 84%;  z-index: 99;">
    </div>
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
