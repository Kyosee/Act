<?php

namespace App\Http\Controllers\Manage;

use EasyWeChat\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Wechat;
use App\Models\Project;
use App\Models\Order;
use App\Models\OrderRefund;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\InvoicesExport;
use Excel;

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

    /**
     * 订单列表
     */
    public function index(Request $request){
        if($request->isMethod('post')){
            return $this->{$request->type}($request->trade);
        }else{
            date_default_timezone_set('PRC');
            if($transaction_id = $request->get('transaction_id')){
                $condition['transaction_id'] = $transaction_id;
            }

            $step = $request->get('step');
            if( $step !==null && $request->get('step') != '*'){
                $condition['step'] = $step;
            }

            $condition['project_id'] = $this->project->id;
            $this->view_data['count'] = Order::select(DB::raw('count(*) as count, step'))->groupBy('step')->get()->toArray();
            $this->view_data['tickets'] = Order::where($condition)->orderBy('created_at', 'desc')->paginate(10);
            return view('manage.ticket.index', $this->view_data);
        }
    }

    /**
     * 核销操作
     */
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

    /**
     * 发起退款申请(新增退款记录)
     */
    public function subRefund($trade){
        if($order = Order::where(['step' => 1, 'out_trade_no' => $trade])->first()){
            $order->step = -1;
            $order->sub_refund_at = time();

            if($order && $order->save()){
                $orderRefund = new OrderRefund();
                $orderRefund->createOrderRefund($order['out_trade_no']);
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }else{
            return response()->json(false);
        }
    }

    /**
     * 同意退款申请
     */
    public function agreeRefund($trade){
        $app = Wechat::buildPayConfig($this->wechat->id, true);

        $condition = ['out_trade_no' => $trade, 'step' => -1];
        $order = Order::where($condition)->first();
        $orderRefund = OrderRefund::where($condition)->first();
        if($order && $orderRefund){
            // Example:
            $result = $app->refund->byTransactionId($order['transaction_id'], $orderRefund['out_refund_no'], $order['total_fee'], $orderRefund['refund_fee'], [
                // 可在此处传入其他参数，详细参数见微信支付文档
                'refund_desc' => '门票退款',
                // 'notify_url'  => env('APP_URL').'/refund_callback/',
            ]);


            if($result['return_code'] === 'SUCCESS'){
                $order->step = -10;
                $orderRefund->refund_id = $result['refund_id'];
                $orderRefund->step = -10;
                $orderRefund->refund_at = time();

                if($order->save() && $orderRefund->save()){
                    return response()->json(true);
                }else{
                    return response()->json(false);
                }

            }else{
                return response()->json(false);
            }
        }else{
            return response()->json(false);
        }
    }

    /**
     * 导出
     */
    public function export_excel(){
        return Excel::download(new InvoicesExport,'ticket.xls');
    }
}
