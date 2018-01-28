<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * 用户参与记录
 */
class ProjectUserPartLogs extends Model {
    public function makeLog($data, $only_one = true){
        if($only_one && !$log = $this->where(['uid' => $data['uid'], 'project_id' => $data['project_id']])->first()){
            $this->uid = $data['uid'] ? $data['uid'] : 0;
            $this->project_id = $data['project_id'];
            $this->added = $data['added'] ? $data['added'] : '';
            $this->save();
        }

        return $log;
    }
}
