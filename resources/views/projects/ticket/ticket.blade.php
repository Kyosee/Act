@extends('projects.ticket._default')
@section('head')
    <title>我的票</title>
@endsection
@section('content')
<title>购票列表</title>
</head>
<body class="order">

	<!-- 加载中弹层[[ -->
	<div class="popload hide">
		<div class="popload-main">
			<span class="popload-main-ico"></span>
			<p class="popload-main-txt">疯狂加载中...</p>
		</div>
	</div>
	<!-- 加载中弹层]] -->

	<section class="main">
		<div class="tips unpay-tips">
			<span class="icon-area icon-ok"><!-- 图标 --></span>购票列表
		</div>

		<ul class="order-content">
			<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">项目名称</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">***************************</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">2018年X月X日XX:XX</dd></dl>

				<div class="btn-area flex-box">
					<a href="#none" class="cancle-btn flex-1">申请退款</a>
					<a href="#none" class="pay-btn flex-1">立即核销</a>
				</div>

			</li>

			<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">项目名称</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">***************************</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">2018年X月X日XX:XX</dd></dl>

				<div class="btn-area flex-box">
					<a href="#none" class="pay-btn flex-1">退款中（用灰色）</a>
				</div>

			</li>

			<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">项目名称</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">***************************</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">2018年X月X日XX:XX</dd></dl>

				<div class="btn-area flex-box">
					<a href="#none" class="pay-btn flex-1">已核销</a>
				</div>

			</li>


						<li class="line-area order-main">
				<dl class="info-line">
					<dd class="info-element station-name">项目名称</dd>
					<dt class="info-label first-line">订 单 号：</dt><dd class="info-element">***************************</dd>
				</dl>
				<dl class="info-line"><dt class="info-label">购买时间：</dt><dd class="info-element">2018年X月X日XX:XX</dd></dl>

				<div class="btn-area flex-box">
					<a href="#none" class="pay-btn flex-1">已退款（用红色）</a>
				</div>

			</li>

		</ul>

	</section>
@endsection
