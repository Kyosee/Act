@extends('projects.fanyifan._default')
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
*{ margin:0; padding:0; list-style:none;}

#la #audio-btn{width: 44px;height: 44px;}
#la .off{background: url('/images/pub/music_off.png') no-repeat 0 0;}
#la .on{background: url('/images/pub/music_on.png') no-repeat 0 0;-webkit-animation: rotating 1.2s linear infinite;animation: rotating 1.2s linear infinite;}

@-webkit-keyframes rotating {
	from{
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
    	transform: rotate(0deg);
	}
	to{
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@keyframes rotating {
    from{
        -webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    to{
        -webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
</style>
<script>
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
		document.getElementById('media').play();
	}
}
la.play();
</script>
@endsection
@section('content')
    <div class="box">
        <div id="la">
        <div id="audio-btn" class="on" onclick="la.changeClass(this,'media')">
        	<audio loop="loop" src="/js/projects/{{ $project->template->template_folder }}/xinnian.mp3" id="media" preload="preload"></audio>
        </div>
        </div>
        <img src="/images/projects/{{ $project->template->template_folder }}/index-bg.png">
        <img src="/images/projects/{{ $project->template->template_folder }}/left-top.png" class="s-xguide-down">
        <img src="/images/projects/{{ $project->template->template_folder }}/rihgt-top.png" class="s-xguide-top">
        <img src="/images/projects/{{ $project->template->template_folder }}/rihgt-bottm.png" class="s-xguide-botdown">
        <img src="/images/projects/{{ $project->template->template_folder }}/dog2.png" class="s-xguide-ind">
        <a href="{{ '/app/'.$project->id.'/game' }}">
            <img src="/images/projects/{{ $project->template->template_folder }}/index-bt.png" class="s-xguide-inb">
        </a>
    </div>
@endsection
