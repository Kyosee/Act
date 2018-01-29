<?php

namespace App\Http\Controllers\Projects;

use App\Models\Prize;
use App\Models\ProjectUserDraw;
use Illuminate\Http\Request;
use App\Models\ProjectUserPartLogs;
use App\Models\ProjectUserPrize;
use App\Http\Controllers\Controller;

class FanyifanController extends ProjectController{

    public function game(Request $request){
        $project_id = $request->route('project')->id;

        // 查询抽奖记录
        $draw_log_list = ProjectUserDraw::where([
            'uid' => session('wechat_user')['id'],
            'project_id' => $project_id,
        ])->get()->toArray();

        // 开始抽奖
    	if($request->isMethod('post')){
            return response()->json($this->_startDraw($request, $draw_log_list));
    	}

        // 初始化游戏格子位置
        $prize_list = $this->_initGameArea($project_id, $draw_log_list);

    	return view('projects.fanyifan.game', [
            'project' => $request->project,
            'prizes' => $prize_list,
        ]);
    }

    /**
     * 初始化创建游戏格子位置区域
     * @return [type] [description]
     */
    private function _initGameArea($project_id, $draw_log_list){
        // 查出所有奖品格子
        $prize_list = Prize::where([
            'project_id' => $project_id,
            'is_special' => false,
            'is_default' => true
        ])->orWhereRaw("
            project_id = {$project_id} and
            is_default = true and
            is_special = true"
        )->get()->toArray();

        shuffle($prize_list);

        // 创建奖品ID位置数组
        foreach ($prize_list as $key => $value) {
            $arr[$key] = $value['id'];
        }

        // 按照用户第一次抽奖的栏位顺序重新排序
        $userPartLogs = new ProjectUserPartLogs();
        if($log = $userPartLogs->makeLog([
            'uid' => session('wechat_user')['id'],
            'project_id' => $project_id,
            'added' => serialize($arr)
        ])){

            foreach (unserialize($log['added']) as $key => $value) {
                foreach ($prize_list as $prize) {
                    if($prize['id'] === $value){
                        $new_prize_list[$key] = $prize;
                    }
                }
            }

            $prize_list = $new_prize_list;
        }

        // 检查用户是否翻过牌,若翻过则将对应牌更改状态
        foreach ($prize_list as $key => $value) {
            foreach ($draw_log_list as $logs) {
                if($value['id'] == $logs['added']){
                    $prize_list[$key]['has_draw'] = 1;
                }
            }
        }

        return $prize_list;
    }

    /**
     * 执行抽奖操作
     * @param  [type] $project       [description]
     * @param  [type] $draw_log_list [description]
     * @return [type]                [description]
     */
    private function _startDraw($request, $draw_log_list){
        $project = $request->route('project');

        // 检测用户抽奖次数
        if(count($draw_log_list) >= (int)$project->game_count){
            // 查询用户是否有奖品
            if($request->special && $user_pirze = ProjectUserPrize::where([
                'uid' => session('wechat_user')['id'],
                'project_id' => $project->id,
            ])->first()){
                $prize = Prize::find($user_prize->prize_id);
                $return['model'] = $chance['prize_desc'];
                return $return;
            }else{
                return false;
            }
        }

        // 创建抽奖记录
        ProjectUserDraw::createLog([
            'uid' => session('wechat_user')['id'],
            'project_id' => $project->id,
            'added' => $request->prize
        ]);

        //判定是否为礼牌
        if($request->special){
            // 开始抽奖
            $prize = new Prize;
            $prize_list = Prize::where([
                ['project_id', '=', $project->id],
                ['is_special', '=', true],
                ['prize_num', '>', 0],
            ])->get()->toArray();

            $chance = $prize->getRand($prize_list);

            // 如果中奖增加奖品纪录
            if(!$chance['is_default']){
                $ProjectUserPrize = new ProjectUserPrize();
                $ProjectUserPrize->createLog([
                    'uid' => session('wechat_user')['id'],
                    'project_id' => $project->id,
                    'prize_id' => $chance['id'],
                    'exchange' => false
                ]);
            }

            $return['id'] = $chance['id'];
            $return['model'] = $chance['prize_desc'];
            $return['is_lucky'] = $chance['is_default'] ? false : true;

            return $return;
        }

        return false;
    }
}
