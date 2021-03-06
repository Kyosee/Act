<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUserDraw extends Model {

    protected $guarded = [];

    /**
     * 创建用户抽奖记录
     * @return [type] [description]
     */
    public static function createLog($data){
        return self::create($data);
    }

    public static function getLog($where){
        return ProjectUserDraw::where($where)->first();
    }
}
