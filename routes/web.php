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

Route::get('about', 'AboutController')->name('about.index');
Route::get('blog', ['uses' => 'PostsController@index', 'as' => 'blog']);
Route::get('blog/{id}', ['uses' => 'PostsController@show', 'as' => 'blog.show']);

Route::get('blogs/{category_id}', [
  'as' => 'blog.category', 'uses' => 'PostsController@listByCategoryId']);

Route::get('bloglist', [
  'as' => 'blog.list', 'uses' => 'PostsController@listOrderByCategories']);

Route::get('categorylist', [
  'as' => 'category.list', 'uses' => 'PostsController@listByCategories']);


Route::get('admin', ['uses' => 'Admin\DashboardController@index', 'as' => 'admin']);
Route::resource('posts', 'Admin\PostsController'); 
Route::resource('categories', 'Admin\CategoriesController'); 
Route::resource('tags', 'Admin\TagsController'); 

Route::get('/email', function () {
    return new App\Mail\ContactEmail();
});

Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');
