<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    protected $table = 'projects';

    protected $guarded = ['uid', 'wechat_id'];

    public function template(){
        return $this->belongsTo('App\Models\ProjectTemplate', 'template_id');
    }
}
