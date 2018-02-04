@extends('layouts.app')
@section('title', '修改用户资料')
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.user._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        修改用户资料
                    </div>
                    <div class="panel-body">
                        @include('common.error')
                        @include('layouts._message')
                        <form class="form-horizontal" action="{{ route('manage.user.edit') }}" method="post">
                            <div class="form-group">
                                <label for="nickname" class="col-sm-2 control-label">用户昵称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nickname" id="nickname" value="{{ old('nickname', $user->nickname) }}" placeholder="请输入用户昵称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-sm-2 control-label">手机号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="请输入手机号">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">邮箱</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="请输入邮箱">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">原密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="请输入原密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="col-sm-2 control-label">新密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="new_password" id="new_password" value="{{ old('new_password') }}" placeholder="请输入新密码">
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
