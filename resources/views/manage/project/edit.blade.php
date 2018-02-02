@extends('layouts.app')
@section('title', '修改应用 - 应用管理 - '.$wechat->wechat_name)
@section('head')
    <link rel="stylesheet" href="/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <script src="/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/libs/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.show', $wechat) }}">{{ $wechat->wechat_name }}</a> -
                        {{ $project->project_name }}
                         - 修改应用
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.index', [$wechat]) }}" class="btn btn-info">返回应用列表</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="bg-info project-control">
                            <a class="btn btn-success" href="{{ route('wechat.project.prize.index', [$wechat, $project]) }}">管理应用奖品</a>
                            <a class="btn btn-info" href="{{ route('wechat.project.show', [$wechat, $project]) }}">应用数据</a>
                            <p>
                                <br />
                                当前应用链接：<input type="text" disabled style="width:100%" class="form-control" value="{{ route('app', [$project, 'index']) }}" placeholder="请输入用户可参与次数">
                            </p>
                        </div>

                        @include('common.error')
                        @include('layouts._message')
                        <form class="form-horizontal" action="{{ route('wechat.project.update', [$wechat, $project]) }}" method="post" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="project_name" class="col-sm-2 control-label">应用名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}" placeholder="请输入应用名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="template_id" class="col-sm-2 control-label">应用模板</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="template_id" name="template_id" value="{{ old('template_id', $project->template_id) }}">
                                        @foreach ($templates as $template)
                                            <option value="{{ $template->id }}">{{ $template->template_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="game_count" class="col-sm-4 control-label">用户可参与次数</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="game_count" id="game_count" value="{{ old('game_count', $project->game_count) }}" placeholder="请输入用户可参与次数">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exchange_pass" class="col-sm-4 control-label">兑换密码</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="exchange_pass" id="exchange_pass" value="{{ old('exchange_pass', $project->exchange_pass) }}" placeholder="请输入兑换密码">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="start_time" class="col-sm-4 control-label">应用开始时间</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datetimepicker" name="start_time" id="start_time" value="{{ old('start_time', $project->start_time) }}" placeholder="请选择应用开始时间">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_time" class="col-sm-4 control-label">应用结束时间</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control datetimepicker" name="end_time" id="end_time" value="{{ old('end_time', $project->end_time) }}" placeholder="请选择应用结束时间">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="share_title" class="col-sm-4 control-label">好友分享标题</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="share_title" id="share_title" value="{{ old('share_title', $project->share_title) }}" placeholder="请填写应用分享标题">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="timeline_share_title" class="col-sm-4 control-label">朋友圈分享标题</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="timeline_share_title" id="timeline_share_title" value="{{ old('timeline_share_title', $project->timeline_share_title) }}" placeholder="请填写应用分享标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="share_desc" class="col-sm-2 control-label">应用分享描述</label>
                                <div class="col-sm-10">
                                    <textarea name="share_desc" class="form-control" rows="8" cols="80">{{ old('share_desc', $project->share_desc) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="share_img" class="col-sm-2 control-label">应用分享图标</label>
                                <div class="col-sm-10">

                                    <input type="file" class="form-control" name="share_img" id="share_img">
                                    @if($project->share_img)
                                        <br>
                                        <img class="thumbnail img-responsive" src="{{ $project->share_img }}" width="200" />
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stats_code" class="col-sm-2 control-label">应用底部统计代码</label>
                                <div class="col-sm-10">
                                    <textarea name="stats_code" class="form-control" rows="8" cols="80">{{ old('stats_code', $project->stats_code) }}</textarea>
                                </div>
                            </div>
                            <input name="_method" type="hidden" value="PATCH">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-7">
                                    <button type="submit" class="btn btn-success">保存提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.datetimepicker').datetimepicker({
            language: 'zh-CN'
        });
    </script>
@endsection
