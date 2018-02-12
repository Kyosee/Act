<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Wechat;

class ProjectController extends Controller{

    /**
     * 自动加载
     */
    public function autoLoad(Project $project, Request $request){
        $controller_name = $project->template->controller_name;
        if(!$controller_name || $controller_name === 'ProjectController'){
            return $this->pageCheck($this, $request);
        }else{
            return $this->pageCheck($controller_name, $request);
        }
    }

    /**
     * 检测页面对应的方法是否存在
     * 若存在则执行相应方法
     * 不存在则直接显示相应页面
     * @param object/string $controller 额外的控制器
     * @param Request $request;
     */
    public function pageCheck($controller, Request $request){
        $project = $request->project;
        $page = $request->page;
        if(time() < strtotime($project->start_time)){
            $page = 'not_start';
        }else if(time() > strtotime($project->end_time)){
            $page = 'end';
        }

        view()->share('jssdk', Wechat::loadWechat(Project::where('id', $project->id)->pluck('wechat_id')[0]));

        if( method_exists($controller, $page) ){
            $cont = new $controller;
            return $cont->$page($request);
        }else if(method_exists($this, $page)){
            return $this->$page($request);
        }else{
            return view('projects' .'.'. $project->template->template_folder. '.' .$page, ['project' => $project]);
        }
    }

    /**
     * create share log
     * @return [type] [description]
     */
    public function share(Request $request){
        $projectShareLog = new \App\Models\ProjectShareLog();
        $projectShareLog->createShareLog($request->project->id);
    }
}
