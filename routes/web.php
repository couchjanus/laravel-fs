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


// Route::get('admin', ['uses' => 'Admin\DashboardController@index', 'as' => 'admin']);
Route::resource('posts', 'Admin\PostsController'); 
Route::resource('categories', 'Admin\CategoriesController'); 
Route::resource('tags', 'Admin\TagsController'); 

Route::get('admin', ['uses' => 'Admin\DashboardController@index', 'as' => 'admin'])->middleware('admin');

Route::get('/email', function () {
    return new App\Mail\ContactEmail();
});

Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admins')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admins.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admins.login.submit');
    Route::get('/', 'Cms\AdminsController@index')->name('admins.dashboard');
});

Route::get('profile/{username}', [
  'as'   => '{username}',
  'uses' => 'ProfileController@show',
]);

// User Profile and Account Routes
Route::resource(
  'profile',
  'ProfileController', [
      'only' => [
          'show',
          'edit',
          'update',
          'create',
      ],
  ]
);

// OAuth Routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
