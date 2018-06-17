@extends('projects.ticket._default')
@section('head')
    <title>活动已结束</title>
    <style>
        .pay{
            font-size: 100px;
        }
    </style>
@endsection
@section('content')
    <a href="ticket" style=" top: 0; right: -38px; margin: 10px 0; position: absolute;z-index: 999">
    	<img src="/images/projects/{{ $project->template->template_folder }}/exchange.png" width="60%" alt="">
    </a>
    <a href="http://mp.weixin.qq.com/s/uf9uWtkXnDX1HoQPVJ_ZNA" style=" top: 33px; right: -38px; margin: 10px 0; position: absolute;z-index: 999">
    	<img src="/images/projects/{{ $project->template->template_folder }}/help.png" width="60%" alt="">
    </a>
    <img src="/images/projects/{{ $project->template->template_folder }}/bg.png" width="100%" height="100%" alt="">
    <div style="position: relative; text-align: center; font-size: 35px; font-weight: bold; bottom: 90px; color: #fff;">已售罄</div>
@endsection
