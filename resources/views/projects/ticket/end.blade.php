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
    <a href="ticket" style=" top: 0; right: 0; font-size: 16px; padding: 10px; color: #fff; position: absolute;z-index: 999">我的兑换</a>
    <img src="/images/projects/{{ $project->template->template_folder }}/bg.png" width="100%" height="100%" alt="">
    <div style="position: relative; text-align: center; font-size: 35px; font-weight: bold; bottom: 90px; color: #fff;">已售罄</div>
@endsection
