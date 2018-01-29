<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUserPrize extends Model
{
    public static function createLog($data){
        self::uid = $data['uid'] ? $data['uid'] : 0;
        self::project_id = $data['project_id'];
        self::added = $data['added'] ? $data['added'] : '';
        self::save();
    }
}
