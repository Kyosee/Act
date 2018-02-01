@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 应用数据
                        <a class="btn btn-success pull-right" href="{{ route('wechat.project.index', [$wechat]) }}">返回应用列表</a>
                    </div>
                    <div class="panel-body wechat-btn-list">
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>参与人数：{{ count($project->part) }}人</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>游戏次数：{{ count($project->draw) }}人</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>分享次数：{{ count($project->share) }}人</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
