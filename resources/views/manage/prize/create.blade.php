@extends('layouts.app')
@section('title', '新增奖品 - 奖品管理 - '.$project->project_name)
@section('head')
    <link href="https://cdn.bootcss.com/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
    <script src="/libs/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.is_default').bootstrapSwitch({
                onText: '是',
                offText: '否',
            });
        })
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a>
                         - 新增奖品
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.prize.index', [$wechat, $project]) }}" class="btn btn-info">返回奖品列表</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('common.error')
                        @include('layouts._message')
                        <form class="form-horizontal" action="{{ route('wechat.project.prize.store', [$wechat, $project]) }}" method="post" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="prize_name" class="col-sm-2 control-label">奖品名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prize_name" id="prize_name" value="{{ old('prize_name') }}" placeholder="请输入奖品名称">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="chance" class="col-sm-4 control-label">中奖概率</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="chance" id="chance" value="{{ old('chance', 0) }}" placeholder="请选择中奖概率">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="day_num" class="col-sm-4 control-label">奖品每日发放数量（不限则填0）</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="day_num" id="day_num" value="{{ old('day_num', 0) }}" placeholder="请选择奖品每日发放数量（不限则填0）">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prize_num" class="col-sm-4 control-label">奖品库存量</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="prize_num" id="prize_num" value="{{ old('prize_num', 0) }}" placeholder="请填写奖品库存量">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="is_default" class="col-sm-4 control-label">是否为默认谢谢参与奖品</label>
                                <div class="col-sm-8 switch switch-large">
                                    <input type="checkbox" name="is_default" class="is_default" value="1" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="prize_img" class="col-sm-4 control-label">奖品图片</label>
                                <div class="col-sm-8">
                                    <input type="file" name="prize_img" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="is_special" class="col-sm-4 control-label">是否为特殊奖品</label>
                                <div class="col-sm-8 switch switch-large">
                                    <input type="checkbox" name="is_special" class="is_default" value="1" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="prize_desc" class="col-sm-2 control-label">奖品描述</label>
                                <div class="col-sm-10">
                                    <textarea name="prize_desc" rows="8" cols="80" id="editor">
                                        {{ old('prize_desc') }}
                                    </textarea>
                                </div>
                            </div>
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
        CKEDITOR.replace( 'editor');
    </script>
@endsection
