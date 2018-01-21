@extends('layouts._default')
@section('title', '新用户注册')
@section('head')
	<script src="{{ mix('/js/passport.js') }}"></script>
@endsection
@section('content')
	<div class="login-body">
		<div class="login-heading">
			<h1>新用户注册</h1>
		</div>
		<div class="login-info" method="POST">
			<form class="passport-form">
				<input type="number" class="user" name="mobile" placeholder="手机号">
				<input type="text" class="user" name="email" placeholder="邮箱">
				<input type="password" name="password" class="lock" placeholder="密码6-12位">
				<input type="password" name="password_confirmation" class="lock" placeholder="确认密码">
				<input style="width:60%;" type="text" class="user" name="captcha" placeholder="验证码">
				<img width="32%" height="42" src="{{ captcha_src() }}" onclick="this.src='/captcha/default?'+Math.random()" class="captcha pull-right">
				<div class="forgot-top-grids">
					<div class="forgot-grid">
						<ul>
							<li>
								<input type="checkbox" name="is_agree" id="brand1" value="1">
								<label for="brand1"><span></span>阅读并同意 <a href="#">《用户服务协议》</a></label>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<input type="submit" name="Sign In" value="立即注册">
				<div class="signup-text">
					<a href="{{ route('login') }}">已经有账号？点此登录.</a>
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
@endsection
