<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function oauthCallback(Request $request){
        var_dump($request->url());
    }
}
