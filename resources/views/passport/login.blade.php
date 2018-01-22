@extends('layouts._default')
@section('title', '用户登录')
@section('head')
	<script src="{{ mix('/js/passport.js') }}"></script>
@endsection
@section('content')
	<div class="login-body">
		<div class="login-heading">
			<h1>用户登录</h1>
		</div>
		<div class="login-info">
			<form class="passport-form" method="POST">
				<input type="text" class="user" name="username" placeholder="邮箱/手机号" required="">
				<input type="password" name="password" class="lock" placeholder="密码">
				<div class="forgot-top-grids">
					<div class="forgot-grid">
						<ul>
							<li>
								<input type="checkbox" id="brand1" name="remember" value="1">
								<label for="brand1"><span></span>下次自动登录</label>
							</li>
						</ul>
					</div>
					<div class="forgot">
						<a href="#">忘记密码？</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<input type="submit" name="Sign In" value="登录">
				<div class="signup-text">
					<a href="{{ route('register') }}">还没有账号？现在就去注册~</a>
				</div>
				<hr>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
@endsection
