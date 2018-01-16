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

Route::get('/oauth_callback', 'WeChatController@oauthCallback');

// Route::group('/act/{id}', function ($id) {
    Route::get('/act/{id}/{page}', function ($id, $page) {
        if($project = Project::find($id)){
            $app = Wechat::loadWechat($project->wechat_id);
            $oauth = $app->oauth;

            session('wechat_user','');

            // 未登录
            if (empty(session('wechat_user'))) {
                session('target_url', Request::url());

                return $oauth->redirect();
                // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
                // $oauth->redirect()->send();
            }

            // 已经登录过
            $user = $session('wechat_user');

        }else{
            App::abort(404);
        }
        var_dump($user);
        dd($user);
    });
// });
