<?php

namespace App\Models;

use App\Models\Wechat as Wechat;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public function saltMaker(){
    	$str = "abcdefghijklmnopqrstuvwxyz";
        $salt = "";
        for($i = 0; $i < 5; $i++)
            $salt .= $str[mt_rand(0,strlen($str)-1)];
        return $salt;
    }

    public function makeOutTradeNo(){
        return strtoupper(uniqid().$this->saltMaker().rand(1000, 9999));
    }

    /**
     * create base order
     * @param  [type]  $wechat_id  [description]
     * @param  [type]  $order_info [description]
     * @param  boolean $is_sub     [description]
     * @return [type]              [description]
     */
    public function createOrder($wechat_id, $order_info, $is_sub = false){
        $app = Wechat::buildPayConfig($wechat_id, $is_sub);
        $order = [
            'body' => isset($order_info['body']) ? $order_info['body'] : '用户订单',
            'out_trade_no' => isset($order_info['out_trade_no']) ? $order_info['out_trade_no'] : $this->makeOutTradeNo(),
            'total_fee' => isset($order_info['total_fee']) ? $order_info['total_fee'] : 1,
            'trade_type' => 'JSAPI',
            'openid' => $order_info['openid'],
        ];
        $result = $app->order->unify($order);

        // 订单创建返回
        if($result['return_code'] === 'SUCCESS'){
        	// 订单入库
        	$this->uid = $order_info['uid'];
        	$this->project_id = $order_info['project_id'];
        	$this->body = $order['body'];
        	$this->out_trade_no = $order['out_trade_no'];
        	$this->openid = $order_info['openid'];
        	$this->prepay_id = $result['prepay_id'];
        	$this->total_fee = $order['total_fee'];
        	$this->save();

        	return $app->jssdk->sdkConfig($result['prepay_id']);
        }else{
        	return false;
        }
    }
}
