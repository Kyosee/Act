<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectTemplateController extends Controller
{
    /**
     * project templates list
     * @return [type] [description]
     */
    public function index(){
        return view('dashboard.templates.index');
    }
}
