<?php

namespace App\Http\Controllers\Projects;

use App\Models\Prize;
use App\Models\UserPartLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FanyifanController extends ProjectController{

    public function game(Request $request){
        UserPartLogs::makeLog([
            'uid' => session('wechat_user')->get('id'),
            'project_id' => $request->route('project')->id
        ]);

    	if($request->isMethod('post')){
            $prize = new Prize;
            $return_prize = $prize->getRand($request->route('project')->id);

            return response()->json(['prize' => $return_prize]);
    	}
    	return view('projects.fanyifan.game', ['project' => $request->project]);
    }
}
