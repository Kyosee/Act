<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUserPrize extends Model
{
    public function createLog($data){
        $this->uid = $data['uid'] ? $data['uid'] : 0;
        $this->project_id = $data['project_id'];
        $this->added = $data['added'] ? $data['added'] : '';
        $this->save();
    }
}
