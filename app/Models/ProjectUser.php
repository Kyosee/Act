<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model{
    protected $fillable = [
        'wechat_id', 'openid', 'nickname', 'avatar', 'gender', 'language', 'city', 'province', 'country'
    ];

    /**
     * create or login wechat user info
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function userSignup($user, $wechat_id){

        if(!$currentUser = $this->where('openid', $user['id'])->first()){
            $this->openid = $user['id'];
            $this->wechat_id = $wechat_id;
            $this->nickname = $user['nickname'] ? $user['nickname'] : '';
            $this->avatar   = $user['avatar'] ? $user['avatar'] : '';
            $this->gender   = isset($user['original']['sex']) ? $user['original']['sex'] : 0;
            $this->language = isset($user['original']['language']) ? $user['original']['language'] : '';
            $this->city     = isset($user['original']['city']) ? $user['original']['city'] : '';
            $this->province = isset($user['original']['province']) ? $user['original']['province'] : '';
            $this->country  = isset($user['original']['country']) ? $user['original']['country'] : '';
            $this->save();

        }
        $currentUser = $this->where('openid', $user['id'])->first();

        session(['wechat_user' => $currentUser->toArray()]);
    }
}
