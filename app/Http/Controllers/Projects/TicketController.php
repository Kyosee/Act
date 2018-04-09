<?php

namespace App\Http\Controllers\Projects;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends ProjectController{
    public function index(){
        dd(session('wechat_user'));
        $order = new Order();
        $result = $order->createOrder(1, ['openid' => session('wechat_user')['openid']], true);
        dd($result);
    }
}
