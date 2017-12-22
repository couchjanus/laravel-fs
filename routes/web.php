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

Route::get('/about', 'AboutController');
Route::get('blog', ['uses' => 'PostsController@index', 'as' => 'blog']);

Route::resource('posts', 'Admin\PostsController'); 
