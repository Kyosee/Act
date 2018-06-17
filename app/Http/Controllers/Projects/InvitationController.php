<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvitationController extends ProjectController{
    /**
	 * 邀请函主页
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request){
        return view('projects.invitation.index');
    }
}
