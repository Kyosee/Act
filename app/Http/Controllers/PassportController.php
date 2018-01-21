<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PassportController extends Controller
{

    /**
     * user login page
     * @return [type] [description]
     */
    public function login(){
        return view('passport.login');
    }

    /**
     * user register page
     * @return [type] [description]
     */
    public function register(){
        dd(auth()->user());
        return view('passport.register');
    }

    /**
     * user register processing
     * @return [type] [description]
     */
    public function subReg(Request $request){
        $this->validate($request, [
            'mobile' => 'required|mobile|unique:users',
            'email' => 'required|email|unique:users|max:30',
            'password' => 'required|confirmed|min:6|max:12',
            'captcha'  => 'required|captcha',
            'is_agree'  => 'accepted',
        ]);

        $User = new User();
        if($User->createNewUser($request)){
            Auth::login($User);
            return response()->json(['result' => true, 'redirect_url' => route('/')]);
        }else{
            return response()->json(['result' => false, 'msg' => '注册失败请稍后重试..']);
        }
    }
}
