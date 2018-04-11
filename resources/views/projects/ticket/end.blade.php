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
    <img src="/images/projects/{{ $project->template->template_folder }}/bg.png" width="100%" height="100%" alt="">
    <div style="position: relative; text-align: center; font-size: 35px; font-weight: bold; bottom: 90px; color: #fff;">活动已结束</div>
@endsection
