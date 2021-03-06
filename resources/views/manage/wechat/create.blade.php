@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        新增公众号
                        <div class="pull-right">
                            <a href="{{ route('wechat.index') }}" class="btn btn-success">返回公众号列表</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('common.error')
                        <form class="form-horizontal" action="{{ route('wechat.store') }}" method="post">
                            <div class="form-group">
                                <label for="wechat_name" class="col-sm-2 control-label">公众号名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="wechat_name" id="wechat_name" value="{{ old('wechat_name') }}" placeholder="请输入公众号名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appid" class="col-sm-2 control-label">APPID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="appid" id="appid" value="{{ old('appid') }}" placeholder="请输入APPID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appsecret" class="col-sm-2 control-label">APPSECRET</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="appsecret" id="appsecret" value="{{ old('appsecret') }}" placeholder="请输入APPSECRET">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">保存提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
