
<!doctype html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="apple-touch-fullscreen" content="YES" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Expires" content="-1" />
    <meta http-equiv="pragram" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="/css/projects/{{ $project->template->template_folder }}/main.css"/>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://cdn.bootcss.com/jquery/2.0.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/libs/layui/layui.all.js"></script>
    <!--移动端版本兼容 -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        wx.config({!! $jssdk->jssdk->buildConfig([
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ ',
            'onMenuShareWeibo',
            'chooseImage',
            'uploadImage'
        ], false) !!});
    </script>
    @yield('head')
</head>
<body class="@yield('body_class', 'order')">
    @yield('content')
    <div style="display:none;">
    </div>
    <script type="text/javascript" charset="utf-8">

    </script>
</body>
</html>
