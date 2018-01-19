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


Route::get('/', function () {
    return view('welcome');
});

// github webhooks
Route::any('/webhooks', 'WebHooksController@index')->name('webhooks');

// user oauth and project page auto load
Route::any('/act/{project}/{page}', 'ProjectController@autoLoad');

// wechat oauth check
Route::get('/oauth_callback/{id}', 'WeChatController@oauthCallback');

Route::group(['prefix' => 'passport'], function(Router $router){
    Route::get('register', 'PassportController@register')->name('register');
    Route::post('register', 'PassportController@subReg');

    Route::get('login', 'PassportController@login')->name('login');
    Route::post('login', 'PassportController@subLogin');

    Route::get('forget', 'PassportController@forget')->name('forget');
    Route::post('forget', 'PassportController@subForget');

    Route::get('logout', 'PassportController@logout')->name('logout');

    Route::get('captcha', 'PassportController@captcha')->name('passport.captcha');
});

// business user manage
Route::group(['prefix' => 'manage', 'namespace' => 'Manage'], function (Router $router){
});
