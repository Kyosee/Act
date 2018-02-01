
<!doctype html>
<html>
<head>
    <title>{{ $project->project_name }}</title>
    <meta charset="utf-8" />
    <meta name="apple-touch-fullscreen" content="YES" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="pragram" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="/css/projects/{{ $project->template->template_folder }}/main.css"/>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://cdn.bootcss.com/jquery/2.0.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/bootstrap.min.js"></script>
    <!--移动端版本兼容 -->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;

        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            // andriod 2.3
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
                // andriod 2.3以上
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
            // 其他系统
        } else {
            document.write('<meta name="viewport" content="width=640,height=1030, user-scalable=no, target-densitydpi=device-dpi">');
        }
        document.addEventListener('touchmove', function(e){e.preventDefault()}, false);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('head')
</head>
<body>
    @yield('content')
    <script type="text/javascript" charset="utf-8">
        wx.config({!! $jssdk->jssdk->buildConfig([
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ ',
            'onMenuShareWeibo',
            'chooseImage',
            'uploadImage'
        ], false) !!});
        wx.ready(function(){
            wx.onMenuShareAppMessage({
                title: "<?=$project->share_title?>", // 分享标题
                desc: "<?=$project->share_desc?>", // 分享描述
                link: "<?=route('app', [$project->id, 'index'])?>", // 分享链接
                imgUrl: "<?=$project->share_img?>", // 分享图标
                success: function () {
                },
                cancel: function () { }
            });
            wx.onMenuShareTimeline({
                title: "<?=$project->share_title?>", // 分享标题
                desc: "<?=$project->share_desc?>", // 分享描述
                link: "<?=request()->url()?>", // 分享链接
                imgUrl: "<?=$project->share_img?>", // 分享图标
                success: function () {
                },
                cancel: function () { }
            });
        });
    </script>
    {!! $project->stats_code !!}
</body>
</html>
