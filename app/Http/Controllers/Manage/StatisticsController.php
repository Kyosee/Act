<?php

namespace App\Http\Controllers\Manage;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\ProjectUserDraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 数据统计控制器
 */
    class StatisticsController extends Controller{

    public function project(Project $project){
        return view('manage.statistics.project', ['project' => $project]);
    }
}
