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
        $result = $app->order->unify([
            'body' => $order_info['body'] ? $order_info['body'] : '用户订单',
            'out_trade_no' => $order_info['out_trade_no'] ? $order_info['out_trade_no'] : $this->makeOutTradeNo(),
            'total_fee' => $order_info['total_fee'] ? $order_info['total_fee'] : 1,
            'trade_type' => 'JSAPI',
            'openid' => $order_info['openid'],
        ]);
        dd($result);
        return $app->jssdk->sdkConfig($result['prepay_id']);
    }
}
