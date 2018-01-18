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


Route::get('/', function () {
    return view('welcome');
});

// github webhooks
Route::any('/webhooks', 'WebHooksController@index')->name('webhooks');

// user oauth and project page auto load
Route::any('/act/{project}/{page}', 'ProjectController@autoLoad');

// wechat oauth check
Route::get('/oauth_callback/{id}', 'WeChatController@oauthCallback');
