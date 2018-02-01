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
        return $this->hasManay('App\Models\Prize', 'project_id');
    }

    public function share(){
        return $this->hasManay('App\Models\ProjectShareLog');
    }

    public function part(){
        return $this->hasManay('App\Models\ProjectUserPartLog');
    }

    public function draw(){
        return $this->hasManay('App\Models\ProjectUserDraw');
    }
}
