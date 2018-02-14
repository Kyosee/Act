@extends('layouts.app')
@section('title', '奖品管理 - ' . $project->project_name . ' - '. $wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 中奖纪录
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.prize.create', [$wechat, $project]) }}" class="btn btn-success">添加新奖品</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">openID</th>
                                    <th class="col-md-4">微信昵称</th>
                                    <th class="col-md-2">中奖时间</th>
                                    <th class="col-md-2">兑换时间</th>
                                    <th class="col-md-2">状态</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prize_log as $log)
                                    <tr>
                                        <td class="col-md-3">{{ $log['user']['openid'] }}</td>
                                        <td>{{ $log['user']['nickname'] }}</td>
                                        <td>{{ $log['created_at'] }}</td>
                                        <td>{{ $log['exchange_time'] }}</td>
                                        <td>{{ $log['exchange'] ? '已兑换' : '未兑换' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">暂无中奖纪录</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $prize_log->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
