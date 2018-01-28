<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    protected $table = 'projects';

    protected $guarded = ['uid', 'wechat_id'];

    public function template(){
        return $this->belongsTo('App\Models\ProjectTemplate', 'template_id');
    }

    public function prize(){
        return $this->hasManay('App\Models\Prize', 'project_id');
    }
}
