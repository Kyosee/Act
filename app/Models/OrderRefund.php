<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderRefund extends Model
{

    protected $table = 'orders_refund';

    public function createOrderRefund($out_trade_no, $info = []){
        $order = Order::where(['out_trade_no' => $out_trade_no, 'step' => -1])->first();
        if($order && !$this->where('out_trade_no', $out_trade_no)->first()){
            $orderOBJ = new Order();

            $this->uid = $order['uid'];
        	$this->project_id = $order['project_id'];
            $this->out_refund_no = 'RE'.$orderOBJ->makeOutTradeNo();
        	$this->out_trade_no = $order['out_trade_no'];
        	$this->openid = $order['openid'];
        	$this->prepay_id = $order['prepay_id'];
            $this->total_fee = $order['total_fee'];
            $this->refund_fee = isset($info['refund_fee']) ? $info['refund_fee'] : $order['total_fee'];
            $this->sub_refund_at = time();
        	$this->step = -1;
        	$this->save();
        }else{
            return false;
        }
    }
}
