@extends('layouts.app')
@section('title', '应用管理 - '.$wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $wechat->wechat_name }} - 应用管理
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.create', $wechat) }}" class="btn btn-success">添加新应用</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">应用名称</th>
                                    <th class="col-md-2">使用模板</th>
                                    <th class="col-md-2">应用开始时间</th>
                                    <th class="col-md-2">应用结束时间</th>
                                    <th class="col-md-3">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                    <tr>
                                        <td>{{ $project['project_name'] }}</td>
                                        <td>{{ $project['template']['template_name'] }}</td>
                                        <td>{{ $project['start_time'] }}</td>
                                        <td>{{ $project['end_time'] }}</td>
                                        <td>
                                            <a href="{{ route('wechat.project.edit', [$wechat, $project->id]) }}" class="btn btn-sm btn-success">管理应用</a>
                                            <a href="" class="btn btn-sm btn-info">应用数据</a>
                                            <a href="" class="btn btn-sm btn-danger">删除应用</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">暂无应用</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
