<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model{

    protected $guarded = ['project_id'];

    /**
    * 抽奖概率计算
    * @param  integer $project_id 所属应用项目ID
    * @return [type]             [description]
    */
    public function getRand($project_id) {
        // 查询该应用下所有奖品
        if(!$prize_list = $this->where([
                ['project_id', '=', $project_id],
                ['prize_num', '>', '0']
            ])->get()->toArray()){
            return false;
        }

        $proSum = 0;
        //概率数组的总概率精度
        foreach ($prize_list as $key => $value) {
            $chance_list[$key] = $value['chance'];
            $proSum += $value['chance'];
        }

        //概率数组循环
        foreach ($chance_list as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        return $prize_list[$result];
    }
}
