@extends('layouts.app')
@section('title', '购票管理 - ' . $project->project_name . ' - '. $wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 订单管理
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.ticket.export_excel', [$wechat, $project]) }}" class="btn btn-danger">导出所有记录</a>
                            <a href="{{ route('wechat.project.show', [$wechat, $project]) }}" class="btn btn-success">返回应用信息</a>
                        </div>
                    </div>
                    <div style="line-height: 50px;">
                        <?php $a = 0;?>
                        @foreach($count as $num)
                            <div class="col-sm-2 text-center">
                            <?php $a = $a + $num['count']?>
                            @switch($num['step'])
                                @case (0)
                                    未支付：{{ $num['count'] }}
                                    @break
                                @case (1)
                                    已支付：{{ $num['count'] }}
                                    @break
                                @case (10)
                                    已用：{{ $num['count'] }}
                                    @break
                                @case (-1)
                                    等待退款：{{ $num['count'] }}
                                    @break
                                @case (-10)
                                    已退款：{{ $num['count'] }}
                                    @break
                            @endswitch
                            </div>
                        @endforeach
                            合计：{{ $a }}
                    </div>
                    <div class="bg-info project-control">
                        <p>
                            <form action="" method="get" class="form-inline">
                                查询：
                                <input type="text" name="transaction_id" class="form-control" placeholder="请输入微信订单号查询">
                                <select name="step" class="form-control" id="">
                                    <option value="*">请选择订单状态</option>
                                    <option @if(Request::get('step') == "0") selected @endif value="0">未支付</option>
                                    <option @if(Request::get('step') == "1") selected @endif value="1">已支付</option>
                                    <option @if(Request::get('step') == "10") selected @endif value="10">已完成</option>
                                    <option @if(Request::get('step') == "-1") selected @endif value="-1">退款审核</option>
                                    <option @if(Request::get('step') == "-10") selected @endif value="-10">已退款</option>
                                </select>
                                <input type="submit" class="btn btn-success" value="查询">
                            </form> 
                        </p>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>基本信息</th>
                                    <th>openID</th>
                                    <th>时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tickets as $order)
                                    <tr>
                                        <td>
                                        	<p>订单号：{{ $order['out_trade_no'] }}</p>
                                        	<p>微信单号：{{ $order['transaction_id'] }}</p>
                                        	<p>订单名称：{{ $order['body'] }}</p>
                                        	<p>订单价格：{{ $order['total_fee'] / 100 }}</p>
                                        </td>
                                        <td>{{ $order['openid'] }}</td>
                                        <td>
                                            <p>创建：{{ $order['created_at'] }}</p>
                                            <p>支付：{{ $order['pay_at'] ? date('Y-m-d H:i:s', $order['pay_at']) : '' }}</p>
                                            <p>兑换：{{ $order['exchange_time'] ? date('Y-m-d H:i:s', $order['exchange_time']) : '' }}</p>
                                        <td>
                                            @switch ($order['step'])
                                                @case (0)
                                                    未支付
                                                    @break
                                                @case (1)
                                                    已支付
                                                    @break
                                                @case (10)
                                                    已用
                                                    @break
                                                @case (-1)
                                                    等待退款
                                                    @break
                                                @case (-10)
                                                    已退款
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch ($order['step'])
                                                @case (1)
                                                    <a href="javascript:;" data-trade="{{ $order['out_trade_no'] }}" class="exchange btn btn-success btn-sm">核销订单</a>
                                                    <a href="javascript:;" data-trade="{{ $order['out_trade_no'] }}" class="subRefund btn btn-danger btn-sm">退款申请</a>
                                                    @break
                                                @case (-1)
                                                    <a href="javascript:;" data-trade="{{ $order['out_trade_no'] }}" class="agreeRefund btn btn-warning btn-sm">同意退款</a>
                                                    @break
                                            @endswitch
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">暂无订单</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".exchange").click(function(event) {
            var _this = $(this)
            $.ajax({
                type: 'post',
                data: {
                    trade: _this.data('trade'),
                    type: 'exchange'
                },
                success:function (data){
                    if(data){
                        layer.alert('核销成功');
                        location.reload();
                    }else{
                        layer.alert('核销失败请稍后重试');
                    }
                }
            })
        });

        $(".subRefund").click(function(event) {
            var _this = $(this)
            $.ajax({
                type: 'post',
                data: {
                    trade: _this.data('trade'),
                    type: 'subRefund'
                },
                success:function (data){
                    if(data){
                        layer.alert('发起退款申请成功');
                        location.reload();
                    }else{
                        layer.alert('发起退款申请失败请稍后重试');
                    }
                }
            })
        });

        $(".agreeRefund").click(function() {
            var _this = $(this)
        	layer.confirm('您确定要进行退款吗？该操作将会直接进行订单退款', {
			  	btn: ['确定','取消'] //按钮
			}, function(){
			  	$.ajax({
	                type: 'post',
	                data: {
	                    trade: _this.data('trade'),
	                    type: 'agreeRefund'
	                },
	                success:function (data){
	                    if(data){
	                        layer.alert('退款请求已提交，请等待微信审核，1-5分钟内刷新查看结果');
	                        location.reload();
	                    }else{
	                        layer.alert('退款失败或该订单已退款请稍后重试');
	                    }
	                }
	            })
			}, function(){});
        });
    </script>
@endsection
