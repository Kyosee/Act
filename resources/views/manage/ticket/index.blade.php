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
                                        <td>{{ $order['openid'] }}</td>
                                        <td>{{ $order['out_trade_no'] }}</td>
                                        <td>{{ $order['body'] }}</td>
                                        <td>{{ $order['total_fee'] }}</td>
                                        <td>{{ date('Y-m-d H:i:s', $order['pay_time']) }}</td>
                                        <td>{{ $order['created_at'] }}</td>
                                        <td>{{ date('Y-m-d H:i:s', $order['exchange_time']) }}</td>
                                        <td>
                                            {{
                                                switch ($order['step']) {
                                                    case '0':
                                                        echo '未支付';
                                                        break;
                                                    case '1':
                                                        echo '已支付';
                                                        break;
                                                    case '10':
                                                        echo '已使用';
                                                        break;
                                                    case '-1':
                                                        echo '等待退款';
                                                        break;
                                                    case '-10':
                                                        echo '已退款';
                                                        break;
                                                }
                                            }}
                                        </td>
                                        <td></td>
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
@endsection
