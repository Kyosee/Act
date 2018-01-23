<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FanyifanController extends ProjectController{

    public function game(Request $request){
    	if($request->isMethod('post')){
    		return  '123';
    	}
    	return view('projects.fanyifan.game', ['project' => $request->project]);
    }
}
