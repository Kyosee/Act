<?php
namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvoicesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {

    	$order = Order::where('step','!=', '0')->select('id','openid','body','out_trade_no','transaction_id','exchange_time','sub_refund_at','pay_at','total_fee','step')->get();
        return $order;
    }

    public function headings(): array
    {
        return [
            'ID',
            'openid',
            '名称',
            '商户订单号',
            '微信订单号',
            '核销时间',
            '发起退款时间',
            '支付时间',
            '支付金额',
            '状态',
        ];
    }

    public function map($order): array
    {
    	switch ($order->step) {
    		case '1':
    			$step = '待核销';
    			break;
    		case '10':
    			$step = '已核销';
    			break;
    		case '-1':
    			$step = '待退款';
    			break;
    		case '-10':
    			$step = '已退款';
    			break;
    	}
        return [
            $order->id,
            $order->openid,
            $order->body,
            $order->out_trade_no,
            $order->transaction_id,
        	$order->exchange_time ? date('Y-m-d H:i:s', $order->exchange_time) : ' ',
        	$order->sub_refund_at ? date('Y-m-d H:i:s', $order->sub_refund_at) : ' ',
        	date('Y-m-d H:i:s', $order->pay_at),
            $order->total_fee/100,
            $step,
        ];
    }
}