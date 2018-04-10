<?php

namespace App\Http\Controllers\Projects;

use EasyWeChat\Factory;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller{

	/**
	 * 门票主页
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request){
        return view('projects.ticket.index');
    }

	public function ticket(){
		return view('projects.ticket.ticket');
	}

	/**
	 * 发起订单
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function subOD(Request $request){
        $order = new Order();

        $order_info['openid'] = session('wechat_user')['openid'];
        $order_info['uid'] = session('wechat_user')['id'];
        $order_info['body'] = '门票订单';
        $order_info['project_id'] = $request->route('project')->id;
        if($result = $order->createOrder(Project::where('id', $request->route('project')->id)->pluck('wechat_id')[0], $order_info, true)){
            return response()->json([
                'status' => 1,
                'json' => $result
            ]);
        }else{
            return response()->json([
                'status' => 0
            ]);
        }
    }
}
