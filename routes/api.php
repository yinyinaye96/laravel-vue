<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//post
// Route::get('post/posts', 'PostController@index');
// Route::post('post/create', 'PostController@create');
// Route::post('post/delete/{id}', 'PostController@destroy');
// Route::get('edit/{id}', 'PostController@edit');
// Route::post('update/{id}', 'PostController@update');
Route::prefix('post')->group(function () {
    Route::get('/posts', 'PostController@index');
    Route::post('/create', 'PostController@create');
    Route::post('/delete/{id}', 'PostController@destroy');
    Route::get('/edit/{id}', 'PostController@edit');
    Route::post('/update/{id}', 'PostController@update');
});

//user
Route::prefix('user')->group(function () {
    Route::get('/users', 'UserController@index');
    Route::post('/create', 'UserController@create');
    Route::post('/delete/{id}', 'UserController@destroy');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::post('/update/{id}', 'UserController@update');
});
// Route::get('users', 'UserController@index');
// Route::post('create', 'UserController@create');
// Route::post('delete/{id}', 'UserController@destroy');
// Route::get('edit/{id}', 'UserController@edit');
// Route::post('update/{id}', 'UserController@update');
