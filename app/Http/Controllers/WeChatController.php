<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wechat;
use App\Models\ProjectUser;
use EasyWeChat\Factory;

class WeChatController extends Controller
{
	/**
	 * 用户授权callback
	 */
    public function oauthCallback($wechat_id){
		$app = Wechat::loadWechat($wechat_id);

		// 获取 OAuth 授权结果用户信息
        if($wechat_user = $app->oauth->user()->toArray()){
            $project_user = new ProjectUser();
            $project_user->userSignup($wechat_user, $wechat_id);
        }

		$targetUrl = empty(session('target_url')) ? '/' : session('target_url');

		return redirect($targetUrl);
    }

    /**
     * 微信支付异步通知回调地址
     */
    public function payNotifyCallback(){
        
    }
}
