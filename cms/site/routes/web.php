<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/admin/apply', function () {
if(Auth::guest()){
        return view('mustlogin');
    } else {
    return view('applyadmin');
    }
});
Route::get('/admin/site', function () {
if(Auth::guest()){
        return view('mustlogin');
    } else {
    return view('configcms');
    }
});
Route::get('/admin/configcache', function () {
if(Auth::guest()){
return view('mustlogin');
} else {Artisan::call('config:cache'); echo app('translator')->get('main.time_sleep'); header('refresh: 5; url='.$_GET['url']);}
});
Route::get('/admin', function () {
    if(Auth::guest()){
        return view('mustlogin');
    } else {
        return redirect('/admin/site');
    }
});
Route::get('/user', function () {
if(Auth::guest()){
        return view('mustlogin');
    } else {
    return redirect('/home');
    }
});
Route::get('/install', function () {
    return view('install');
});
Route::match(['get', 'post'], '/install/apply', function () {
    return view('installapply');
});
Route::get('/install/save', function () {
    return view('installsave');
});
Route::get('/install/complete', function () {
    return view('installcomplete');
});
Route::get('page-{page_id}-{page_name}.html', function ($page_id,$page_name) {
    return view('page');
});
Auth::routes();

Route::get('/home', 'HomeController@index');