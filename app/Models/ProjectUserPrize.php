<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUserPrize extends Model {


    public function createLog($data){
        $this->uid = $data['uid'] ? $data['uid'] : 0;
        $this->project_id = $data['project_id'];
        $this->prize_id = $data['prize_id'] ;
        $this->exchange = $data['exchange'] ? $data['exchange'] : false;
        $this->save();
    }

    public function user(){
        return $this->belongsTo('App\Models\ProjectUser', 'uid');
    }
}
