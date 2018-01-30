<?php
use Illuminate\Routing\Router;

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
Route::get('/', 'Manage\WechatController@index')->name('/')->middleware('auth');


// github webhooks
Route::any('/webhooks', 'WebHooksController@index')->name('webhooks');

// user oauth and project page auto load
Route::any('/app/{project}/',function($project){
    return redirect("/app/{$project}/index");
});
Route::any('/app/{project}/{page}', 'Projects\ProjectController@autoLoad')->name('app')->middleware('project_auto');

// wechat oauth check
Route::get('/oauth_callback/{id}', 'WeChatController@oauthCallback');

// user passport
Route::group(['prefix' => 'passport'], function(Router $router){
    $router->get('register', 'PassportController@register')->name('register');
    $router->post('register', 'PassportController@subReg');

    $router->get('login', 'PassportController@login')->name('login');
    $router->post('login', 'PassportController@subLogin');

    $router->get('forget', 'PassportController@forget')->name('forget');
    $router->post('forget', 'PassportController@subForget');

    $router->any('logout', function(){
        auth()->logout();
        return redirect('/');
    })->name('logout');
});

// admin user dashboard group
// Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function(Router $router){
//
//     $router->get('/', 'HomeController@index')->name('dashboard.index');
//
//     $router->resource('users', 'UserController');
//
//     // project template
//     $router->resource('project_templates', 'ProjectTemplateController');
// });

// user manage group
Route::group(['prefix' => 'manage', 'namespace' => 'Manage', 'middleware' => 'auth'], function (Router $router){
    $router->get('/', 'WechatController@index')->name('/');

    $router->post('/uploader', 'HomeController@uploader')->name('manage.uploader');

    $router->resource('wechat', 'WechatController');

    $router->resource('wechat.project', 'ProjectController');

    $router->resource('wechat.project.prize', 'PrizeController');

    $router->get('/statistics/project/{project}', 'StatisticsController@project')->name('statistics.project');
});
