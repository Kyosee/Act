<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wechat;
use App\Models\Project;
use App\Models\ProjectTemplate;
use App\Http\Requests\ProjectRequest;
use App\Handlers\ImageUploadHandler;

class ProjectController extends Controller {

    private $wechat;

    public function __construct(Request $request){
        $this->wechat = Wechat::find($request->route('wechat'));
    }

    /**
    * show project list
    * @return [type] [description]
    */
    public function index(){
        $this->authorize('checkUser', $this->wechat);
        $projects = Project::where(['wechat_id' => $this->wechat->id])->get();
        return view('manage.project.index', ['projects' => $projects, 'wechat' => $this->wechat]);
    }

    public function show(){
        return redirect()->route('wechat.project.show', $this->wechat);
    }

    /**
     * create new project
     * @return [type] [description]
     */
    public function create(){
        $this->authorize('checkUser', $this->wechat);

        return view('manage.project.create', [
            'wechat' => $this->wechat,
            'templates' => ProjectTemplate::get()
        ]);
    }

    /**
     * save project data
     * @param  ProjectRequest     $request  [description]
     * @param  ImageUploadHandler $uploader [description]
     * @return [type]                       [description]
     */
    public function store(ProjectRequest $request, ImageUploadHandler $uploader){
        $this->authorize('checkUser', $this->wechat);

        $project = new Project();

        $project->project_name = $request->project_name;
        $project->wechat_id = $this->wechat->id;
        $project->uid = auth()->user()->id;
        $project->game_count = $request->game_count;
        $project->exchange_pass = $request->exchange_pass;
        $project->share_title = $request->share_title;
        $project->share_desc = $request->share_desc;
        $project->stats_code = $request->stats_code;
        $project->start_time = $request->start_time;
        $project->end_time = $request->end_time;
        $project->template_id = $request->template_id;

        if ($request->share_img) {
            $result = $uploader->save($request->share_img, 'wechats/'.$this->wechat->id.'/projects', str_random(3), 180);
            if ($result) {
                $project->share_img = $result['path'];
            }
        }

        $project->save();
        return redirect()->route('wechat.project.index', $this->wechat)->with('success', '新增应用成功！');
    }

    /**
     * edit project page
     * @param  Wechat  $wechat  [description]
     * @param  Project $project [description]
     * @return [type]           [description]
     */
    public function edit(Wechat $wechat, Project $project){
        $this->authorize('checkUser', $this->wechat);
        $this->authorize('checkProject', $project);

        return view('manage.project.edit', [
            'project' => $project,
            'wechat' => $wechat,
            'templates' => ProjectTemplate::get()
        ]);
    }

    /**
     * update project
     * @param  ProjectRequest     $request  [description]
     * @param  Wechat             $wechat   [description]
     * @param  Project            $project  [description]
     * @param  ImageUploadHandler $uploader [description]
     * @return [type]                       [description]
     */
    public function update(ProjectRequest $request, Wechat $wechat, Project $project, ImageUploadHandler $uploader){
        $this->authorize('checkUser', $wechat);
        $this->authorize('checkProject', $project);

        $project->project_name = $request->project_name;
        $project->game_count = $request->game_count;
        $project->exchange_pass = $request->exchange_pass;
        $project->share_title = $request->share_title;
        $project->share_desc = $request->share_desc;
        $project->start_time = $request->start_time;
        $project->stats_code = $request->stats_code;
        $project->end_time = $request->end_time;
        $project->template_id = $request->template_id;

        if ($request->share_img) {
            $result = $uploader->save($request->share_img, 'wechats/'.$wechat->id.'/projects', $project->id, 180);
            if ($result) {
                $project->share_img = $result['path'];
            }
        }

        $project->save();
        return redirect()->back()->with('success', '应用信息更新成功！');
    }

    /**
     * soft delete project
     * @param  Wechat  $wechat  [description]
     * @param  Project $project [description]
     * @return [type]           [description]
     */
    public function destroy(Wechat $wechat, Project $project){
        $this->authorize('checkUser', $wechat);
        $this->authorize('checkProject', $project);

        $project->delete();
    }
}
