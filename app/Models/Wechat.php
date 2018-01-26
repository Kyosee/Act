<?php

namespace App\Models;
use EasyWeChat\Factory;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model{
    protected $table = 'wechats';

    protected $guarded = ['uid'];


    /**
     * create easywechat config from database
     * @param  [type] $wechat_id wechat table id
     * @return [type]            [description]
     */
    private static function buildConfig($wechat_id){
        if($wechat = self::find($wechat_id)){
            return $config = [
                'app_id' => $wechat->app_id,
                'secret' => $wechat->secret,

                // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
                'response_type' => 'array',

                'log' => [
                    'level' => 'debug',
                    'file' => storage_path().'/wechat.log',
                ],
                'oauth' => [
                    'scopes'   => ['snsapi_userinfo'],
                    'callback' => '/oauth_callback/'.$wechat_id,
                ],
            ];
        }else{
            return false;
        }
    }

    /**
     * load easywechat object
     * @param  [type] $wechat_id [description]
     * @return [type]            [description]
     */
    public static function loadWechat($wechat_id){
        if($config = self::buildConfig($wechat_id)){
            return Factory::officialAccount($config);
        }else{
            return false;
        }
    }

    /**
     * check user oauth
     * @param  [type] $wechat_id [description]
     * @return [type]            [description]
     */
    public static function oauthCheck($wechat_id, $target_url = '/'){
        if($app = self::loadWechat($wechat_id)){
            // 未登录
            session()->put('target_url', $target_url);
            return $app->oauth->redirect();
        }else{
            return abort(404);
        }
    }
}
