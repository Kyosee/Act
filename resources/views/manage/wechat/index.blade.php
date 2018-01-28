@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        公众号管理
                        <div class="pull-right">
                            <a href="{{ route('wechat.create') }}" class="btn btn-success">添加新公众号</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-4">公众号名称</th>
                                    <th class="col-md-4">Token</th>
                                    <th class="col-md-4">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($wechats as $wechat)
                                    <tr>
                                        <td>{{ $wechat['wechat_name'] }}</td>
                                        <td>{{ $wechat['token'] }}</td>
                                        <td>
                                            <a href="{{ route('wechat.show', $wechat) }}" class="btn btn-sm btn-success">管理公众号</a>
                                            <a href="" class="btn btn-sm btn-danger">删除该公众号</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">暂无公众号</td>
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
