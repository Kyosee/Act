<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>邀请函</title>
    <link rel="stylesheet" type="text/css" href="/css/projects/{{ $project->template->template_folder }}/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="MobileOptimized" content="320"/>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <style media="screen">
    #la{ position: absolute; z-index: 99; right: 0;}
    #la #audio-btn{width: 44px;height: 44px;}
    #la .off{background: url('/images/projects/pub/music_off.png') no-repeat 0 0;}
    #la .on{background: url('/images/projects/pub/music_on.png') no-repeat 0 0;-webkit-animation: rotating 1.2s linear infinite;animation: rotating 1.2s linear infinite;}
    </style>
</head>
<body>
    <div id="la">
        <div id="audio-btn" class="on" onclick="la.changeClass(this,'media')">
            <audio loop="loop" src="/js/projects/{{ $project->template->template_folder }}/bgm.mp3" id="media" preload="preload"></audio>
        </div>
    </div>
    <div class="swiper-container" id="mySwiper">
        <div class="swiper-wrapper">
            @for($i=1; $i<=5; $i++)
            <div class="swiper-slide {{$i == 1 ? 'swiper-no-prev' : ($i == 5 ? 'swiper-no-next' : '')}}">
                <div class="page" id="page-1">
                    <img width="100%" height="100%" src="/images/projects/{{ $project->template->template_folder }}/i{{$i}}.jpg" />
                </div>
            </div>
            @endfor
        </div>
    </div>
    <div class="up"><div class="ups"></div></div>
    <!--  <span id="form_ajax_url" style="display:none;"></span>-->
    <script type="text/javascript" src="/js/projects/{{ $project->template->template_folder }}/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/projects/{{ $project->template->template_folder }}/idangerous.swiper-2.6.1.min.js"></script>
    <script type="text/javascript" src="/js/projects/{{ $project->template->template_folder }}/jquery.transit.min.js"></script>
    <script type="text/javascript" src="/js/projects/{{ $project->template->template_folder }}/common12.js"></script>
    <script type="text/javascript" src="/js/projects/{{ $project->template->template_folder }}/weixinapi.js"></script>
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
    var la = {
        changeClass: function (target,id) {
            var className = $(target).attr('class');
            var ids = document.getElementById(id);
            (className == 'off')
            ? $(target).removeClass('off').addClass('on')
            : $(target).removeClass('on').addClass('off');
            (className == 'off')
            ? ids.play()
            : ids.pause();
        },
        play:function(){
            $("#media").play();
        }
    }

    // 音乐播放
    function autoPlayMusic() {
        // 自动播放音乐效果，解决浏览器或者APP自动播放问题
        function musicInBrowserHandler() {
            musicPlay(true);
            document.body.removeEventListener('touchstart', musicInBrowserHandler);
        }
        document.body.addEventListener('touchstart', musicInBrowserHandler);

        // 自动播放音乐效果，解决微信自动播放问题
        function musicInWeixinHandler() {
            musicPlay(true);
            document.addEventListener("WeixinJSBridgeReady", function () {
                musicPlay(true);
            }, false);
            document.removeEventListener('DOMContentLoaded', musicInWeixinHandler);
        }
        document.addEventListener('DOMContentLoaded', musicInWeixinHandler);
    }
    function musicPlay(isPlay) {
        var audio = document.getElementById('media');
        if (isPlay && audio.paused) {
            audio.play();
        }
        if (!isPlay && !audio.paused) {
            audio.pause();
        }
    }
    autoPlayMusic();
    </script>
</body>
</html>
