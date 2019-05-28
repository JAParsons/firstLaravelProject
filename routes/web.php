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
})->name('home');

Route::post('/register',[
    'uses' => 'UserController@postRegister',
    'as' => 'register'
]);

Route::post('/login',[
    'uses' => 'UserController@postLogin',
    'as' => 'login'
]);

Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/account',[
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateaccount',[
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}',[
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);

Route::get('/dashboard',[
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost',[
    'uses' => 'PostController@postCreate',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::get('/postdelete/{post_id}',[
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/edit',[
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);