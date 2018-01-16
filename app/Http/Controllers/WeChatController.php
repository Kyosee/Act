<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wechat;
use App\Models\Project;
use EasyWeChat\Factory;

class WeChatController extends Controller
{
	/**
	 * 用户授权callback
	 */
    public function oauthCallback($id){
		$app = Wechat::loadWechat($id);

		// 获取 OAuth 授权结果用户信息
		$user = $app->oauth->user();

		session()->put('wechat_user',$user->toArray());

		$targetUrl = empty(session('target_url')) ? '/' : session('target_url');

		return redirect($targetUrl);
    }
}
