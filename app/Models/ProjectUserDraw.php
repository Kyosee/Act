<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUserDraw extends Model {

    /**
     * 创建用户抽奖记录
     * @return [type] [description]
     */
    public static function createLog($data){
        return self::create($data);
    }
}
