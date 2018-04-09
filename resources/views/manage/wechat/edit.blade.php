@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $wechat->wechat_name }} - 修改公众号
                        <div class="pull-right">
                            <a href="{{ route('wechat.show', $wechat) }}" class="btn btn-info">返回公众号管理</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('common.error')
                        @include('layouts._message')
                        <form class="form-horizontal" action="{{ route('wechat.update', $wechat) }}" method="post">
                            <h3>基本信息</h3>
                            <div class="form-group">
                                <label for="wechat_name" class="col-sm-2 control-label">公众号名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="wechat_name" id="wechat_name" value="{{ old('wechat_name', $wechat->wechat_name) }}" placeholder="请输入公众号名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appid" class="col-sm-2 control-label">APPID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="appid" id="appid" value="{{ old('appid', $wechat->appid) }}" placeholder="请输入APPID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appsecret" class="col-sm-2 control-label">APPSECRET</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="appsecret" id="appsecret" value="{{ old('appsecret', $wechat->appsecret) }}" placeholder="请输入APPSECRET">
                                </div>
                            </div>
                            <h3>支付信息</h3>
                            <div class="form-group">
                                <label for="appid" class="col-sm-2 control-label">API密钥</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pay_key" id="pay_key" value="{{ old('pay_key', $wechat->pay_key) }}" placeholder="请输入微信支付API密钥">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appid" class="col-sm-2 control-label">微信支付商户号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="merchant_id" id="merchant_id" value="{{ old('merchant_id', $wechat->merchant_id) }}" placeholder="请输入微信支付商户号">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="appsecret" class="col-sm-2 control-label">子商户号（选填）</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sub_merchant_id" id="sub_merchant_id" value="{{ old('sub_merchant_id', $wechat->sub_merchant_id) }}" placeholder="请输入子商户号">
                                </div>
                            </div>
                            <input name="_method" type="hidden" value="PATCH">
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
