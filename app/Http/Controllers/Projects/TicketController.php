<?php

namespace App\Http\Controllers\Projects;

use EasyWeChat\Factory;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller{
	
    public function index(Request $request){
        $order = new Order();

        $order_info['openid'] = session('wechat_user')['openid'];
        $order_info['uid'] = session('wechat_user')['id'];
        $order_info['body'] = '门票订单';
        $order_info['project_id'] = $request->route('project')->id;
        $result = $order->createOrder(2, $order_info, true);


        return view('projects.ticket.index', [
            'config' => $result,
        ]);
    }
}
