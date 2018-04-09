<?php

namespace App\Http\Controllers\Manage;

use App\Models\Wechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WechatRequest;

class WechatController extends Controller {
    public function __construct(){
        view()->share('controller','wechat');
    }

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
        $wechat = new Wechat();

        $wechat->wechat_name = $request->wechat_name;
        $wechat->appid = $request->appid;
        $wechat->appsecret = $request->appsecret;
        $wechat->uid = auth()->user()->id;

        if($wechat->save()){
            return redirect()->route('wechat.index')->with('success', '新增公众号成功！');
        }else{
            return redirect()->back()->with('danger', '新增公众号失败请稍后重试');
        }
    }

    /**
     * show edit wechat page
     * @param  Wechat $wechat [description]
     * @return [type]         [description]
     */
    public function edit(Wechat $wechat){
        $this->authorize('checkUser', $wechat);
        return view('manage.wechat.edit', ['wechat' => $wechat]);
    }

    /**
     * save wechat update data
     * @param  WechatRequest $request [description]
     * @param  Wechat        $wechat  [description]
     * @return [type]                 [description]
     */
    public function update(WechatRequest $request, Wechat $wechat){
        $this->authorize('checkUser', $wechat);

        $wechat->wechat_name = $request->wechat_name;
        $wechat->appid = $request->appid;
        $wechat->appsecret = $request->appsecret;
        $wechat->pay_key = $request->pay_key;
        $wechat->merchant_id = $request->merchant_id;
        $wechat->sub_merchant_id = $request->sub_merchant_id;

        $wechat->save();
        return redirect()->back()->with('success', '公众号信息更新成功');
    }
}
