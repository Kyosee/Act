@extends('projects.ticket._default')
@section('head')
    <style>
    body{ margin:0; width:640px; height:1030px;}
    .box{ position:relative;}
    .box .s-xguide-down{
        position: absolute;
        left: 32px;
        top: 249px;
    }

    @-webkit-keyframes
    s-xguide-down{

        0%,100%{
            -webkit-transform:translate(40px,0);
            opacity:1
        }
        50%{
            -webkit-transform:translate(0px,0);
            opacity:1
        }
    }
    .s-xguide-down{

        -webkit-animation:s-xguide-down
        4.0s
        infinite
        ease-in-out;
    }
    .box .s-xguide-top{
        position: absolute;
        right: 89px;
        top: -12px;
    }

    @-webkit-keyframes
    s-xguide-top{

        0%,100%{
            -webkit-transform:translate(100px,0);
            opacity:1
        }
        50%{
            -webkit-transform:translate(0px,0);
            opacity:1
        }
    }
    .s-xguide-top{

        -webkit-animation:s-xguide-top
        8.0s
        infinite
        ease-in-out;
    }
    .box .s-xguide-botdown{
        position: absolute;
        right: 148px;
        top: 852px;
        z-index: 11;
    }

    @-webkit-keyframes
    s-xguide-botdown{

        0%,100%{
            -webkit-transform:translate(20px,0);
            opacity:1
        }
        50%{
            -webkit-transform:translate(0px,0);
            opacity:1
        }
    }
    .s-xguide-botdown{

        -webkit-animation:s-xguide-botdown
        5.0s
        infinite
        ease-in-out;
    }
    .box .s-xguide-ind{
        position: absolute;
        right: 114px;
        top: 310px;
    }

    @-webkit-keyframes
    s-xguide-ind{

        0%,100%{
            -webkit-transform:translate(0,25px);
            opacity:1
        }
        50%{
            -webkit-transform:translate(0px,0);
            opacity:1
        }
    }
    .s-xguide-ind{

        -webkit-animation:s-xguide-ind
        2.0s
        infinite
        ease-in-out;
    }
    .box .s-xguide-inb{
        position: absolute;
        right: 198px;
        top: 793px;
        z-index:33;
    }
    @-webkit-keyframes
    s-xguide-inb{

        0%,100%{
            -webkit-transform:scale(1,1);
            opacity:1
        }
        50%{
            -webkit-transform:scale(0.9,0.9);
            opacity:1
        }
    }
    .s-xguide-inb{

        -webkit-animation:s-xguide-inb
        1.0s
        infinite
        ease-in-out;
    }
}
</style>
@endsection
@section('content')
    <script type="text/javascript" charset="utf-8">
        wx.chooseWXPay({
            timestamp: <?= $config['timestamp'] ?>,
            nonceStr: '<?= $config['nonceStr'] ?>',
            package: '<?= $config['package'] ?>',
            signType: '<?= $config['signType'] ?>',
            paySign: '<?= $config['paySign'] ?>', // 支付签名
            success: function (res) {
                // 支付成功后的回调函数
            }
        });
    </script>
@endsection
