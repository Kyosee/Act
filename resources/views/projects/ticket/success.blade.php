@extends('projects.ticket._default')
@section('head')
    <title>支付成功</title>
@endsection
@section('body_class', 'success')
@section('content')
	<section class="main">
		<div class="tips suc-tips">
			<span class="icon-area icon-ok"><!-- 图标 --></span>支付成功
		</div>

		<div class="suc-main">
			<div class="top-area flex-box">
				<dl class="station-info flex-1">
					<dt class="station-name">门票一张</dt>
					<dd class="time-info">{{ $ticket->created_at }}</dd>
					<dd class="pwd-info">订单号：{{ $ticket->out_trade_no }}</dd>
				</dl>

			</div>
		</div>
		<!-- 提示[[ -->
		<dl class="tips-area">
			<a href="index" class="btn btn-green pay-btn">再买一张</a><br>
			<a href="ticket" class="btn btn-green pay-btn">我的门票</a>
            <dd class="tarea-title"></dd>
			<dd class="tarea-title">兑换须知：</dd>
			<dt class="num-list">1、</dt><dd class="tips-info">活动地点：烟台大悦城西南中庭</dd>
			<dt class="num-list">2、</dt><dd class="tips-info">使用时间：2018年4月21日10时-4月30日20时</dd>
			<dt class="num-list">3、</dt><dd class="tips-info">使用规则：</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（1）凭购买成功页至现场核销入场；</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（2）每张入场券仅限一人入场；</dd>
			<dt class="num-list">&nbsp;</dt><dd class="tips-info">（3）儿童需由成人购票陪伴入场。</dd>
		</dl>
		<!-- 提示]] -->
	</section>
@endsection
