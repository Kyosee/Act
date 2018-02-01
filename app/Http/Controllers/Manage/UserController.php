<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function edit(Request $request){
        // if(route()->isMethod('post')){
        //     $this->validate($request, [
        //         'nickname' => 'required|max:50',
        //         'mobile' => 'required|unique:mobile|max:50',
        //         'email' => 'required|unique:email|max:50',
        //         'password' => 'nullable|min:6'
        //         'new_password' => 'nullable|min:6'
        //     ]);
        //
        //     $data = [];
        //     $data['name'] = $request->name;
        //     if($request->password){
        //         $data['password'] = bcrypt($request->password);
        //     }
        //
        //     $user->update($data);
        //
        //     return redirect()->route('user.show', $user);
        // }
        return view('manage.user.edit', ['user' => auth()->user()]);
    }
}
