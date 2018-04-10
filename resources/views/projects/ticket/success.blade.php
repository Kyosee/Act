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

			<div class="barcode-area">
				<!-- 一维码列表[[ -->
				<ul class="barcode-list">
					<li class="flex-box barcode-img">
						<img src="/images/projects/{{ $project->template->template_folder }}/barcode_demo.png" class="flex-1">
					</li>
				</ul>
				<!-- 一维码列表]] -->
			</div>
		</div>
		<!-- 提示[[ -->
		<dl class="tips-area">
			<a href="index" class="btn btn-green pay-btn">再买一张</a>
            <dd class="tarea-title"></dd>
			<dd class="tarea-title">兑换须知：</dd>
			<dt class="num-list">1、</dt><dd class="tips-info">活动地点：烟台大悦城XXXXX</dd>
			<dt class="num-list">2、</dt><dd class="tips-info">开放时间：2018年X月XX日-X月XX日（10:00-21:00）</dd>
			<dt class="num-list">3、</dt><dd class="tips-info">使用规则：XXXXXXXXXXX</dd>
		</dl>
		<!-- 提示]] -->
	</section>
@endsection
