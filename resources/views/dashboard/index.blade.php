@extends('layouts._default_dashboard')
@section('title', '控制台')
@section('head')
<!-- js-->
<script src="js/modernizr.custom.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
@endsection
@section('content')

	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page">
			<!-- four-grids -->
			<div class="row four-grids">
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-book"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>
								Tickets
								<span>Answered</span>
							</h3>
							<p>452</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-rocket"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>
								New
								<span>Projects</span>
							</h3>
							<p>745</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-bar-chart"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>
								Our
								<span>Status</span>
							</h3>
							<p>125</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-user"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>
								Daily
								<span>Visitors</span>
							</h3>
							<p>7462</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //four-grids -->
		</div>
	</div>
@endsection
