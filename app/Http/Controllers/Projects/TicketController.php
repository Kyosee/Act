<?php

namespace App\Http\Controllers\Projects;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends ProjectController{
    public function index(){
        $order = new Order();
        $result = $order->createOrder(1, ['openid' => session('wechat_user')['openid']])
        dd($result);
    }
}
