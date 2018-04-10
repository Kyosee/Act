@extends('projects.ticket._default')
@section('head')
    <title>我的票</title>
@endsection
@section('content')
	<a href="index" class="btn btn-green pay-btn">再买一张</a>

	<section class="main">
		<div class="tips unpay-tips">
			<span class="icon-area icon-ok"><!-- 图标 --></span>购票列表
		</div>

		<ul class="order-content">
		@forelse($ticket_list as $ticket)
			<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">门票一张</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">{{ $ticket->out_trade_no }}</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">2018年X月X日XX:XX</dd></dl>

				<div class="btn-area flex-box">
				@switch($ticket->step)
					@case(1)
					<a href="#none" class="cancle-btn flex-1">申请退款</a>
					<a href="#none" class="pay-btn flex-1" data-trade="{{ $ticket->out_trade_no }}">立即核销</a>
					@break

					@case(10)
					<a href="javascript:void(0);" class="pay-btn flex-1">已核销</a>
					@break

					@case(-1)
					<a href="#none" class="pay-btn flex-1">等待退款中</a>
					@break
					@case(-10)
					<a href="javascript:void(0);" class="pay-btn flex-1">已退款</a>
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
	</section>
	<script>
		$(".pay-btn").click(function() {
			layer.prompt({title: '请输入核销密码', formType: 1}, function(pass, index){
				layer.close(index);
				$.ajax({
					url: "{{ '/app/'.$project->id.'/exchange' }}",
					type: 'post',
					data: {pass: pass},
					success: function(data){
						if(data){
							layer.alert('核销成功', {
							  closeBtn: 0
							},function(){
								location.reload();
							})
						}else{
							layer.msg('核销失败或密码错误');
						}
					}
				})
			});
		});
	</script>
@endsection
