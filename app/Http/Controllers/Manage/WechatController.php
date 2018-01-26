<?php

namespace App\Http\Controllers\Manage;

use App\Models\Wechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WechatRequest;

class WechatController extends Controller {

    /**
     * wecaht list
     * @return [type] [description]
     */
    public function index(){
        $wechats = Wechat::where('uid', auth()->user()->id)->get();
        return view('manage.wechat.index', ['wechats' => $wechats]);
    }

    /**
     * manage wechat info
     * @return [type] [description]
     */
    public function show(Wechat $wechat){
        $this->authorize('checkUser', $wechat);
        return view('manage.wechat.show', ['wechat' => $wechat]);
    }

    /**
     * input wechat page
     * @return [type] [description]
     */
    public function create(){
        return view('manage.wechat.create');
    }

    /**
     * save new wechat
     * @return [type] [description]
     */
    public function store(WechatRequest $request){
        $data = $request->toArray();
        unset($data['pathinfo']);
        $data['uid'] = auth()->user()->id;
        if(Wechat::create($data)){
            return redirect()->route('wechat.index')->with('success', '新增公众号成功！');
        }else{
            return redirect()->back()->with('danger', '新增公众号失败请稍后重试');
        }
    }
}
