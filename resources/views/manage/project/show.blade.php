@extends('layouts.app')
@section('title', '应用数据 - 应用管理 - '.$wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 应用数据
                        <a class="btn btn-info pull-right" href="{{ route('wechat.project.index', [$wechat]) }}">返回应用列表</a>
                    </div>
                    <div class="panel-body wechat-btn-list">
                        <div class="col-md-4 text-center">
                            <a class="bg-info"><h3>参与人数：{{ count($project->part) }}人</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="bg-info"><h3>游戏次数：{{ count($project->draw) }}次</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="bg-info"><h3>分享次数：{{ count($project->share) }}次</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ route('wechat.project.prize.log', [$wechat, $project]) }}" class="bg-success"><h3>中奖人数：{{ count($project->user_prize) }}人</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
