@extends('layouts.app')
@section('title', '公众号管理')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('') }}">{{ $project->project_name }}</a> - 应用数据
                        <div class="pull-right">
                            <a href="{{ route('wechat.create') }}" class="btn btn-success">添加新公众号</a>
                        </div>
                    </div>
                    <div class="panel-body wechat-btn-list">
                        <div class="col-md-4 text-center">
                            <a href="" class="bg-success"><h3>123</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#" class="bg-success"><h3>321</h3></a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="" class="bg-success"><h3>123</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
