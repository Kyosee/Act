@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        当前公众号：{{ $wechat->wechat_name }}
                        <a class="btn btn-success pull-right" href="{{ route('wechat.index') }}">返回公众号列表</a>
                    </div>
                    <div class="panel-body wechat-btn-list">
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>管理应用</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>数据统计</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-info"><h3>设置</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
