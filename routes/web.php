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
        $app = Wechat::loadWechat($project->wechat_id);

        // 未登录
        if (empty(session('wechat_user'))) {
            session()->put('target_url',Request::url());
            return $app->oauth->redirect();
        }

        // 已经登录过
        $user = session('wechat_user');

    }else{
        App::abort(404);
    }
    dd($user);
});
