<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPartLogs extends Model
{
    public static function makeLog($data, $only_one = true){
        if($only_one && !$this->where(['uid' => $data, 'project_id' => $data['project_id']])->find()){
            $this->uid = $data['uid'];
            $this->project_id = $data['project_id'];
            $this->added = $data['added'];
            $this->save();
        }
        dd(123);
    }
}
