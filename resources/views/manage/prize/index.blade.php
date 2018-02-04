@extends('layouts.app')
@section('title', '奖品管理 - ' . $project->project_name . ' - '. $wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 管理奖品
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.prize.create', [$wechat, $project]) }}" class="btn btn-success">添加新奖品</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">奖品图片</th>
                                    <th class="col-md-4">奖品名称</th>
                                    <th class="col-md-2">中奖概率</th>
                                    <th class="col-md-2">奖品剩余</th>
                                    <th class="col-md-3">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prizes as $prize)
                                    <tr>
                                        <td><img src="{{ $prize['prize_img'] }}" width="50" /></td>
                                        <td>{{ $prize['prize_name'] }}</td>
                                        <td>{{ $prize['chance'] }}</td>
                                        <td>{{ $prize['prize_num'] }}</td>
                                        <td>
                                            <a href="{{ route('wechat.project.prize.edit', [$wechat, $project, $prize]) }}" class="btn btn-sm btn-success">修改奖品</a>
                                            <a href="javascript:delModel('{{ route('wechat.project.prize.destroy', [$wechat, $project, $prize]) }}')" class="btn btn-sm btn-danger">删除奖品</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">暂无奖品</td>
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
