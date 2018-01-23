
<!doctype html>
<html>
<head>
    <title>旺年驾Dog</title>
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
    </script>

    @yield('head')
</head>
<body>
    @yield('content')
</body>
</html>