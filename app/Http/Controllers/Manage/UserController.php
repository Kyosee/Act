<?php

namespace App\Http\Controllers\Manage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function __construct(){
        view()->share('controller','user');
    }

    public function index(){
        return view('manage.user.index');
    }

    public function edit(Request $request){
        if($request->isMethod('post')){
            $user = User::find(auth()->user()->id);
            $this->validate($request, [
                'nickname' => 'nullable|max:50',
                // 'mobile' => 'required|unique:users|mobile|max:50',
                // 'email' => 'required|unique:users|email|max:50',
                'password' => 'nullable|min:6',
                'new_password' => 'nullable|min:6'
            ]);

            $data = [];
            $data['nickname'] = $request->nickname;
            // $data['mobile'] = $request->mobile;
            // $data['email'] = $request->email;

            if($request->password && $request->new_password){
                $now_password = $user->where('id', auth()->user()->id)->value('password');
                if(\Hash::check($request->password, $now_password)){
                    $data['password'] = bcrypt($request->new_password);
                }else{
                    return redirect()->route('manage.user.edit', $user)->with('danger', '原密码输入错误');
                }
            }

            $user->update($data);

            return redirect()->route('manage.user.edit', $user)->with('success', '用户信息修改成功');
        }
        return view('manage.user.edit', ['user' => auth()->user()]);
    }
}
