<?php

namespace App\Models;
use EasyWeChat\Factory;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
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
                    'callback' => '/oauth_callback',
                ],
            ];
        }else{
            return false;
        }
    }

    public static function loadWechat($wechat_id){
        if($config = self::buildConfig($wechat_id)){
            return Factory::officialAccount($config);
        }else{
            return false;
        }
    }
}
