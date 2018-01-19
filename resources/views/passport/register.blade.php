@extends('layouts._default')
@section('title', '新用户注册')
@section('content')
	<div class="login-body">
		<div class="login-heading">
			<h1>新用户注册</h1>
		</div>
		<div class="login-info">
			<form>
				<input type="text" class="user" name="email" placeholder="用户名" required="">
				<input type="text" class="user" name="email" placeholder="邮箱" required="">
				<input type="password" name="password" class="lock" placeholder="密码">
				<input type="password" name="password" class="lock" placeholder="确认密码">
				<input type="submit" name="Sign In" value="立即注册">
				<div class="signup-text">
					<a href="{{ route('login') }}">已经有账号？点此登录.</a>
				</div>
			</form>
		</div>
	</div>
@endsection
