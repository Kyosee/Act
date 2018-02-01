<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model{
    use SoftDeletes;

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'projects';

    protected $guarded = ['uid', 'wechat_id'];

    public function template(){
        return $this->belongsTo('App\Models\ProjectTemplate', 'template_id');
    }

    public function prize(){
        return $this->hasMany('App\Models\Prize', 'project_id');
    }

    public function share(){
        return $this->hasMany('App\Models\ProjectShareLog', 'project_id');
    }

    public function part(){
        return $this->hasMany('App\Models\ProjectUserPartLog', 'project_id');
    }

    public function draw(){
        return $this->hasMany('App\Models\ProjectUserDraw', 'project_id');
    }
}
