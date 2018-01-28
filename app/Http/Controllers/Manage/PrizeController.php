<?php

namespace App\Http\Controllers\Manage;

use App\Models\Prize;
use App\Models\Project;
use App\Models\Wechat;
use Illuminate\Http\Request;
use App\Http\Requests\PrizeRequest;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;

class PrizeController extends Controller {

    private $wechat;
    private $project;

    /**
     * check wechat and project
     * @param Request $request [description]
     */
    public function __construct(Request $request){

        $this->middleware(function ($requests, $next) {
            // $wechat = Wechat::find($requests->route('wechat'));
            $wechat = !empty($requests->route('wechat')->id) ? $requests->route('wechat') : Wechat::find($requests->route('wechat'));
            $project = !empty($requests->route('project')->wechat_id) ? $requests->route('project') : Project::find($requests->route('project'));

            if($wechat->uid !== auth()->user()->id || $project->wechat_id !== $wechat->id){
                abort(403, 'This action is unauthorized.');
            }
            return $next($requests);
        });

        $this->wechat = Wechat::find($request->route('wechat'));
        $this->project = Project::find($request->route('project'));

        $this->view_data = [
            'project' => $this->project,
            'wechat' => $this->wechat
        ];
    }

    /**
     * show project prize list
     * @return [type] [description]
     */
    public function index(){
        $this->view_data['prizes'] = Prize::where(['project_id' => $this->project->id])->get();
        return view('manage.prize.index', $this->view_data);
    }

    /**
     * show create prize page
     * @return [type] [description]
     */
    public function create(){
        return view('manage.prize.create', $this->view_data);
    }

    /**
     * save prize data
     * @param  PrizeRequest       $request  [description]
     * @param  ImageUploadHandler $uploader [description]
     * @return [type]                       [description]
     */
    public function store(PrizeRequest $request, ImageUploadHandler $uploader){
        $prize = new Prize();

        $prize->prize_name = $request->prize_name;
        $prize->project_id = $this->project->id;
        $prize->prize_desc = $request->prize_desc;
        $prize->chance = $request->chance;
        $prize->day_num = $request->day_num;
        $prize->prize_num = $request->prize_num;
        $prize->is_default = $request->is_default ? $request->is_default : false;
        $prize->is_special = $request->is_special ? $request->is_special : false;

        if ($request->prize_img) {
            $result = $uploader->save($request->prize_img, 'wechats/'.$this->wechat->id.'/projects', str_random(3), 180);
            if ($result) {
                $prize->prize_img = $result['path'];
            }
        }

        $prize->save();
        return redirect()->route('wechat.project.prize.index', $this->view_data)->with('success', '新增奖品成功！');
    }

    /**
     * load edit prize page
     * @param  [type] $wechat  [description]
     * @param  [type] $project [description]
     * @param  Prize  $prize   [description]
     * @return [type]          [description]
     */
    public function edit($wechat, Project $project, Prize $prize){
        // check user's project authorize
        $this->checkPrize($project, $prize);

        $this->view_data['prize'] = $prize;
        return view('manage.prize.edit', $this->view_data);
    }

    /**
     * save update prize data
     * @param  ProjectRequest     $request  [description]
     * @param  Wechat             $wechat   [description]
     * @param  Project            $project  [description]
     * @param  ImageUploadHandler $uploader [description]
     * @return [type]                       [description]
     */
     public function update(PrizeRequest $request, Wechat $wechat, Project $project, Prize $prize, ImageUploadHandler $uploader){
         $this->checkPrize($project, $prize);

         $prize->prize_name = $request->prize_name;
         $prize->prize_desc = $request->prize_desc;
         $prize->chance = $request->chance;
         $prize->day_num = $request->day_num;
         $prize->prize_num = $request->prize_num;
         $prize->is_default = $request->is_default ? $request->is_default : false;
         $prize->is_special = $request->is_special ? $request->is_special : false;


         if ($request->prize_img) {
             $result = $uploader->save($request->prize_img, 'wechats/'.$this->wechat->id.'/projects', str_random(3), 180);
             if ($result) {
                 $prize->prize_img = $result['path'];
             }
         }

         $prize->save();
         return redirect()->back()->with('success', '奖品信息更新成功！');
    }

    /**
     * check prize and project
     * @param  Project $project [description]
     * @param  Prize   $prize   [description]
     * @return [type]           [description]
     */
    private function checkPrize(Project $project, Prize $prize){
        $now_project = Project::find($prize->project_id);
        $this->authorize('checkProject', $now_project);

        if((int)$prize->project_id !== (int)$project->id){
            abort(403, 'This action is unauthorized.');
        }
    }
}
