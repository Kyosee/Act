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
        $this->uid = session('wechat_user')['id'];
        $this->project_id = $project_id;
        $this->wechat_id = Project::where('id', $project_id)->select('wechat_id');
        $this->save();
    }
}
