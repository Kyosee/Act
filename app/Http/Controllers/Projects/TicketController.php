<?php

namespace App\Http\Controllers\Projects;

use EasyWeChat\Factory;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends ProjectController{

	/**
	 * 门票主页
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request){
        return view('projects.ticket.index');
    }

    /**
     * 门票列表
     */
	public function ticket(Request $request){
		return view('projects.ticket.ticket', ['ticket_list' => Order::where([
            'project_id' => $request->route('project')->id,
            'uid' => session('wechat_user')['id']
        ])->where('step', '!=', 0)->orderBy('created_at', 'desc')->get()]);
	}

    /**
     * 支付成功
     */
    public function success(Request $request){
        return view('projects.ticket.success', ['ticket' => Order::where([
            'project_id' => $request->route('project')->id,
            'uid' => session('wechat_user')['id']
        ])->where('step', '!=', 0)->orderBy('created_at', 'desc')->first()]);
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
