
<!doctype html>
<html>
<head>
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
        wx.ready(function(){
            wx.onMenuShareAppMessage({
                title: "<?=$project->share_title?>", // 分享标题
                desc: "<?=$project->share_desc?>", // 分享描述
                link: "<?=route('app', [$project->id, 'index'])?>", // 分享链接
                imgUrl: "<?=$project->share_img?>", // 分享图标
                success: function () {
                    $.ajax({
                        url: "{{ route('app', [$project->id, 'share']) }}",
                    })
                },
                cancel: function () { }
            });
            wx.onMenuShareTimeline({
                title: "<?=$project->timeline_share_title?>", // 分享标题
                desc: "<?=$project->share_desc?>", // 分享描述
                link: "<?=request()->url()?>", // 分享链接
                imgUrl: "<?=$project->share_img?>", // 分享图标
                success: function () {
                    $.ajax({
                        url: "{{ route('app', [$project->id, 'share']) }}",
                    })
                },
                cancel: function () { }
            });
        });
    </script>
    @yield('head')
</head>
<body class="@yield('body_class', 'order')">
    @yield('content')
    <div style="display:none;">
        {!! $project->stats_code !!}
    </div>
</body>
</html>
