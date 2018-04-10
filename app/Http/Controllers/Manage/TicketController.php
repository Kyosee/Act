<?php

namespace App\Http\Controllers\Manage;

use App\Models\Wechat;
use App\Models\Project;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{

    private $wechat;
    private $project;

    /**
     * check wechat and project
     * @param Request $request [description]
     */
    public function __construct(Request $request){
        view()->share('controller','project');

        $this->middleware(function ($requests, $next) {
            // $wechat = Wechat::find($requests->route('wechat'));
            $wechat = !empty($requests->route('wechat')->id) ? $requests->route('wechat') : Wechat::find($requests->route('wechat'));
            $project = !empty($requests->route('project')->wechat_id) ? $requests->route('project') : Project::find($requests->route('project'));

            if($wechat->uid != auth()->user()->id || $project->wechat_id != $wechat->id){
                abort(403, 'This action is unauthorized.');
            }
            return $next($requests);
        });

        $this->wechat = Wechat::find($request->route('wechat'));
        $this->project = Project::find($request->route('project'));

        $this->view_data = [
            'project' => $this->project,
            'wechat' => $this->wechat
        ];
    }

    public function index(Request $request){
        if($request->isMethod('post')){
            return $this->{$request->type}($request->trade);
        }else{
            $this->view_data['tickets'] = Order::where('project_id', $this->project->id)->paginate(10);
            return view('manage.ticket.index', $this->view_data);
        }
    }

    private function exchange($trade){
        $order = Order::where(['out_trade_no' => $trade, 'step' => 1])->first();

        $order->step = 10;
        $order->exchange_time = time();

        if($order && $order->save()){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
     
    }
}
