<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function oauthCallback(){
        var_dump(URL::getRequest());
    }
}
