<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model{

    protected $guarded = ['project_id'];

    /**
     * 抽奖概率计算
     * @param  [type] $prize_list 概率数组
     * @return [type]              [description]
     */
    public function getRand($prize_list) {
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

    public static function minusPrizeNum($prize_id){
        self::where('id', $prize_id)->decrement('prize_num');
    }
}
