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
     * user login
     */
    public function subLogin(Request $request){
        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $this->validate($request, [
            'username' => 'required|'.$field.'|max:30',
            'password' => 'required|min:6',
        ]);


        $request->merge([$field => $request->input('login')]);

        $credentials = [
            $field     => $request->username,
            'password' => $request->password,
        ];

        // user login and remember me
        if(Auth::attempt($credentials, $request->has('remember'))){
            return response()->json(['result' => true, 'redirect_url' => route('/')]);
        }else{
            return response()->json(['result' => false, 'msg' => '用户不存在或用户名密码有误']);
        }
    }

    /**
     * user register page
     * @return [type] [description]
     */
    public function register(){
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
