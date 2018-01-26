<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wechat;
use Illuminate\Auth\Access\HandlesAuthorization;

class WechatPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function checkUser(User $currentUser, Wechat $wechat){
        return $currentUser->id === $wechat->uid;
    }
}
