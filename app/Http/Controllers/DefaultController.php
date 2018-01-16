<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function autoPage($project_id, $page){
        echo $project_id;
        echo $page;
    }
}
