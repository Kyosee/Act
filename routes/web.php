<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Project;
use App\Models\Wechat;
use EasyWeChat\Factory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oauth_callback/{id}', 'WeChatController@oauthCallback');

Route::get('/act/{id}/{page}', function ($id, $page) {
    if($project = Project::find($id)){
        if(!session('wechat_user')){
            return Wechat::oauthCheck($project->wechat_id, Request::url());
        }else{
            return Redirect::action($project->controller_name.'@autoPage', ['project_id' => $id, 'page' => $page]);
        }
    }else{
        App::abort(404);
    }
    dd(session('wechat_user'));
});
