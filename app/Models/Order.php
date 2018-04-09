<?php

namespace App\Models;

use App\Models\Wechat as Wechat;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public function createOrder($wechat_id, $order_info, $is_sub = false){
        $app = Wechat::buildPayConfig($wechat_id, $is_sub);
        $result = $app->order->unify([
            'body' => '腾讯充值中心-QQ会员充值',
            'out_trade_no' => '20150806125346',
            'total_fee' => 88,
            'trade_type' => 'JSAPI',
            'openid' => $order_info['openid'],
        ]);
        return $app->sdkConfig($result['prepayId']);
    }
}
