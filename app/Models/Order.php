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
        dd($this->makeOutTradeNo());
        $app = Wechat::buildPayConfig($wechat_id, $is_sub);
        $result = $app->order->unify([
            'body' => '腾讯充值中心-QQ会员充值',
            'out_trade_no' => '20150806125346',
            'total_fee' => 1,
            'trade_type' => 'JSAPI',
            'openid' => $order_info['openid'],
        ]);
        return $app->jssdk->sdkConfig($result['prepay_id']);
    }
}
