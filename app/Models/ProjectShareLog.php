<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectShareLog extends Model {

    /**
     * create share log
     * @return [type] [description]
     */
    public function createShareLog($project_id){
        $this->uid = (int)session('wechat_user')['id'];
        $this->project_id = (int)$project_id;
        $this->wechat_id = (int)Project::where('id', $project_id)->select('wechat_id');
        $this->save();
    }
}
