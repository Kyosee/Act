<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model{

    /**
    * 抽奖概率计算
    * @param  integer $project_id 所属应用项目ID
    * @return [type]             [description]
    */
    public function getRand($project_id) {
        // 查询该应用下所有奖品
        if(!$prize_list = $this->where([
                ['project_id', '=', $project_id],
                ['now_num', '>', '0']
            ])->all()->toArray()){
            return false;
        }

        //概率数组的总概率精度
        $proSum = array_sum($prize_list['chance']);
        //概率数组循环
        foreach ($prize_list as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset ($prize_list);
        return $result;
    }
}
