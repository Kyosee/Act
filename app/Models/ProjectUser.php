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

        if(!$currentUser = $this->where('openid', $user['id'])->first()->toArray()){
            $this->openid = $user['id'];
            $this->wechat_id = $wechat_id;
            $this->nickname = $user['nickname'];
            $this->avatar = $user['avatar'];
            $this->gender = $user['original']['sex'];
            $this->language = $user['original']['language'];
            $this->city = $user['original']['city'];
            $this->province = $user['original']['province'];
            $this->country = $user['original']['country'];
            $this->save();

            $currentUser = $this->where('openid', $user['id'])->first()->toArray();
        }

        session(['wechat_user' => $currentUser]);
    }
}
