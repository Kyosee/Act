<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Wechat;
use EasyWeChat\Factory;

class ProjectController extends Controller{

    public function autoLoad(Project $project, $page, Request $request){
        var_dump($project);exit;
        if(!$project){
            abort(404);
        }

        if(!session('wechat_user')){
            // return Wechat::oauthCheck($project->wechat_id, $request->url());
        }

        if($project->controller_name !== 'ProjectController'){
            $auto_load_controller = new $project->controller_name;
            return $auto_load_controller->autoLoad($project, $page);
        }else{
            return view('projects' .'.'. $project->project_folder. '.' .$page);
        }
    }
}
