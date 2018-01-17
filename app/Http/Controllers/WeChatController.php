<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wechat;
use App\Models\User;
use EasyWeChat\Factory;

class WeChatController extends Controller
{
	/**
	 * 用户授权callback
	 */
    public function oauthCallback($id){
		$app = Wechat::loadWechat($id);

		// 获取 OAuth 授权结果用户信息
        if($wechat_user = $app->oauth->user()->toArray()){
            $user = new User();
            $user->userSignup($wechat_user);
        }

		$targetUrl = empty(session('target_url')) ? '/' : session('target_url');

		return redirect($targetUrl);
    }
}
