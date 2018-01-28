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

        $draw_log_list = ProjectUserDraw::where([
            'uid' => session('wechat_user')['id'],
            'project_id' => $project_id,
        ])->get()->toArray();

        // 开始抽奖
    	if($request->isMethod('post')){

            if(count($draw_log_list) >= $request->route('project')->game_count)
                return false;

            // 创建抽奖记录
            ProjectUserDraw::createLog([
                'uid' => session('wechat_user')['id'],
                'project_id' => $project_id,
                'added' => $request->prize
            ]);

            //判定是否为礼牌
            if($request->special){
                $prize = new Prize;
                $prize_list = Prize::where([
                    ['project_id', '=', $project_id],
                    ['is_special', '=', true],
                    ['prize_num', '>', 0],
                ])->get()->toArray();

                $chance = $prize->getRand($prize_list);

                // 增加奖品纪录
                if(!$chance['is_default']){
                    ProjectUserPrize::createLog([
                        'uid' => session('wechat_user')['id'],
                        'project_id' => $project_id,
                        'prize_id' => $chance['id'],
                        'exchange' => false
                    ])
                }

                $return['id'] = $chance['id'];
                $return['model'] = $chance['prize_desc'];
                $return['is_lucky'] = $chance['is_default'] ? false : true;

                return response()->json($return);
            }
    	}

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

        // 创建抽奖概率相关数组
        foreach ($prize_list as $key => $value) {
            $arr[$key] = $value['id'];
            $chance[$key]['id'] = $value['id'];
            $chance[$key]['chance'] = $value['chance'];
        }

        // 新增用户参与记录
        $userPartLogs = new ProjectUserPartLogs();

        // 按照用户第一次抽奖的栏位顺序重新排序
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
        }



        $prize_list = $new_prize_list ? $new_prize_list : $prize_list;

        foreach ($prize_list as $key => $value) {
            foreach ($draw_log_list as $logs) {
                if($value['id'] == $logs['added']){
                    $prize_list[$key]['has_draw'] = 1;
                }
            }
        }

    	return view('projects.fanyifan.game', [
            'project' => $request->project,
            'prizes' => $prize_list,
        ]);
    }
}
