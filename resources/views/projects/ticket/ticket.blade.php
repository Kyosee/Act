@extends('projects.ticket._default')
@section('head')
    <title>我的兑换</title>
@endsection
@section('content')

	<section class="main">
		<div class="tips unpay-tips">
			<span class="icon-area icon-ok"><!-- 图标 --></span>我的兑换
		</div>

		<ul class="order-content">
		@forelse($ticket_list as $ticket)
			<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">{{ $ticket->body }}</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">{{ $ticket->out_trade_no }}</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">{{ date('Y-m-d H:i:s', $ticket->pay_at) }}</dd></dl>

				<div class="btn-area flex-box">
				@switch($ticket->step)
					@case(1)
					<a href="#none" class="cancle-btn flex-1" data-trade="{{ $ticket->out_trade_no }}">申请退款</a>
					<a href="#none" class="pay-btn exchange-btn flex-1" data-trade="{{ $ticket->out_trade_no }}">立即核销</a>
					@break

					@case(10)
					<b class="pay-btn flex-1">已核销</b>
					@break

					@case(-1)
					<b class="pay-btn flex-1" style="color: #999999">退款中</b>
					@break
					@case(-10)
					<b class="pay-btn flex-1" style="color: #ff0000">已退款</b>
					@break
				@endswitch
				</div>

			</li>
		@empty
            <li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">您还没有买票呢</dd>
				</dl>
			</li>
        @endforelse
		</ul>
		<dl class="tips-area">
			<a href="index" class="btn btn-green pay-btn">再买一张</a>
            <dd class="tarea-title"></dd>
			<dd class="tarea-title">兑换须知：</dd>
			<dt class="num-list">1、</dt><dd class="tips-info">活动地点：烟台大悦城西南中庭</dd>
			<dt class="num-list">2、</dt><dd class="tips-info">使用时间：2018年4月21日10时-4月30日20时</dd>
			<dt class="num-list">3、</dt><dd class="tips-info">使用规则：</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（1）凭购买成功页至现场核销入场；</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（2）每张入场券仅限一人入场；</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（3）儿童需由成人购票陪伴入场。</dd>
		</dl>
	</section>
	<script>
		$(".exchange-btn").click(function() {
			var _this = $(this)
			layer.prompt({title: '请输入核销密码', formType: 1}, function(pass, index){
				layer.close(index);
				$.ajax({
					url: "exchange",
					type: 'post',
					data: {
						pass: pass, 
						trade: _this.data('trade')
					},
					success: function(data){
						if(data){
							layer.alert('核销成功', {
							  closeBtn: 0
							},function(){
								location.reload();
							})
						}else{
							layer.msg('核销失败或密码错误');
							location.reload();
						}
					}
				})
			});
		});

		$(".cancle-btn").click(function(event) {
			var _this = $(this)
			layer.confirm('您确定要申请退款吗？', {
			  	btn: ['确定','取消'] //按钮
			}, function(){
				$.ajax({
					url: 'subRefund',
					type: 'post',
					data: {trade: _this.data('trade')},
					success: function(data){
						if(data){
							layer.alert('您的退款申请已提交，审核通过后将退回原账户', {
							  closeBtn: 0
							},function(){
								location.reload();
							})
						}else{
							layer.msg('申请失败请稍后重试');
							location.reload();
						}
					}
				})
			}, function(){});
		});
	</script>
@endsection
