<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Wechat;
use EasyWeChat\Factory;

class ProjectController extends Controller
{
    public function autoLoad(Project $project, $page){
        $request = new Request();
        if($project){
            if(!session('wechat_user')){
                return Wechat::oauthCheck($project->wechat_id, $request->url());
            }
        }else{
            App::abort(404);
        }

        retrun view($project->project_name. '.' .$page);
    }
}
