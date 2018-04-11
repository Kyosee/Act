@extends('layouts.app')
@section('title', '购票管理 - ' . $project->project_name . ' - '. $wechat->wechat_name)
@section('content')
    <div class="container">
        <div class="row">
            @include('manage.project._menu')
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('wechat.project.edit', [$wechat, $project]) }}">{{ $project->project_name }}</a> - 购票管理
                        <div class="pull-right">
                            <a href="{{ route('wechat.project.show', [$wechat, $project]) }}" class="btn btn-success">返回应用信息</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('layouts._message')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>openID</th>
                                    <th>订单号</th>
                                    <th>商品名称</th>
                                    <th>价格</th>
                                    <th>支付时间</th>
                                    <th>创建时间</th>
                                    <th>使用时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tickets as $order)
                                    <tr>
                                        <td>{{ $order['out_trade_no'] }}</td>
                                        <td>{{ $order['openid'] }}</td>
                                        <td>{{ $order['body'] }}</td>
                                        <td>{{ $order['total_fee'] / 100 }}</td>
                                        <td>{{ $order['pay_at'] ? date('Y-m-d H:i:s', $order['pay_at']) : '' }}</td>
                                        <td>{{ $order['created_at'] }}</td>
                                        <td>{{ $order['exchange_at'] ? date('Y-m-d H:i:s', $order['exchange_at']) : '' }}</td>
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
                                                    <a href="javascript:;" data-trade="{{ $order['out_trade_no'] }}" class="btn btn-danger btn-sm">退款申请</a>
                                                    @break
                                                @case (-1)
                                                    <a href="javascript:;" data-trade="{{ $order['out_trade_no'] }}" class="btn btn-warn btn-sm">同意退款</a>
                                                    @break
                                            @endswitch
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">暂无订单</td>
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
                        layer.msg('核销成功');
                        location.reload();
                    }else{
                        alert('核销失败请稍后重试');
                    }
                }
            })
        });
    </script>
@endsection
