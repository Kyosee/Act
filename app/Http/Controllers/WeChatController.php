<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wechat;
use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectUser;
use EasyWeChat\Factory;

class WeChatController extends Controller {

    /**
     *  作用：将xml转为array
     */
    public function xmlToArray($xml) {       
        //将XML转为array        
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);      
        return $array_data;
    }

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
    public function payNotifyCallback(Request $request){
        if($request->isMethod('post')){
            $data = $this->xmlToArray(file_get_contents("php://input"));
            $order = Order::where('out_trade_no', $data['out_trade_no'])->first();
            $project = Project::where('id', $order->project_id)->first();

            $app = Wechat::buildPayConfig($project->wechat_id);

            $response = $app->handlePaidNotify(function($message, $fail){
                // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
                $order = Order::where('out_trade_no', $message['out_trade_no'])->where('step', 0)->first();

                if (!$order || $order->step === 1) { // 如果订单不存在 或者 订单已经支付过了
                    return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
                }

                ///////////// <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 /////////////

                if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                    // 用户是否支付成功
                    if (array_get($message, 'result_code') === 'SUCCESS') {
                        $order->transaction_id = $message['transaction_id']; // 更新微信订单号
                        $order->pay_at = time(); // 更新支付时间为当前时间
                        $order->step = 1;

                    // 用户支付失败
                    } elseif (array_get($message, 'result_code') === 'FAIL') {
                        $order->step = 0;
                    }
                } else {
                    return $fail('通信失败，请稍后再通知我');
                }

                $order->save(); // 保存订单

                return true; // 返回处理完成
            });

            return $response;
        }
    }

    /**
     * 退款异步通知
     */
    public function refundNotifyCallback(){
        if($request->isMethod('post')){
            $data = $this->xmlToArray(file_get_contents("php://input"));
            $order = Order::where('out_trade_no', $data['out_trade_no'])->first();
            $project = Project::where('id', $order->project_id)->first();

            $app = Wechat::buildPayConfig($project->wechat_id);

            $response = $app->handleRefundedNotify(function ($message, $reqInfo, $fail) {
                // 其中 $message['req_info'] 获取到的是加密信息
                // $reqInfo 为 message['req_info'] 解密后的信息
                // 你的业务逻辑...
                return true; // 返回 true 告诉微信“我已处理完成”
                // 或返回错误原因 $fail('参数格式校验错误');
            });

            return $response;
        }
    }
}
