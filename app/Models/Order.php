<?php

namespace App\Models;

use App\Models\Wechat as Wechat;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public function createOrder($wechat_id, $order_info){
        $app = Wechat::buildPayConfig($wechat_id);
        $result = $app->order->unify([
            'body' => '腾讯充值中心-QQ会员充值',
            'out_trade_no' => '20150806125346',
            'total_fee' => 88,
            'notify_url' => '', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => $order_info['openid'],
        ]);

        return $result;
    }
}
