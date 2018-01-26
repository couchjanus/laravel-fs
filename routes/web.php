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

Route::get('/vue/items', function () {
    $results =  \App\Post::all();
    return $results;
});

Route::get('/items', function () {
    return view('items');
});


Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::model('page', 'App\Page');


Route::prefix('admins')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admins.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admins.login.submit');

    Route::get('/users', 'Cms\UsersController@index')->name('users.index');
    Route::get('/users/create', 'Cms\UsersController@create')->name('users.create');
    Route::get('/users/{id}/edit', 'Cms\UsersController@edit')->name('users.edit');
    Route::get('/users/show/{id}', 'Cms\UsersController@show')->name('users.show');

    Route::post('/users/store', 'Cms\UsersController@store')->name('users.store');
    Route::patch('/users/update/{id}', 'Cms\UsersController@update')->name('users.update');
    Route::delete('/users/destroy/{id}', 'Cms\UsersController@destroy')->name('users.destroy');
    Route::get('/admins', 'Cms\AdminsController@list')->name('admins.index');
    Route::get('/admins/create', 'Cms\AdminsController@create')->name('admins.create');
    Route::get('/admins/{id}/edit', 'Cms\AdminsController@edit')->name('admins.edit');

    Route::post('/admins/store', 'Cms\AdminsController@store')->name('admins.store');
    Route::patch('/admins/update/{id}', 'Cms\AdminsController@update')->name('admins.update');
    
    Route::get('/permissions', 'Cms\PermissionsController@index')->name('permissions.index');
    Route::get('/permissions/create', 'Cms\PermissionsController@create')->name('permissions.create');
    Route::get('/permissions/{id}/edit', 'Cms\PermissionsController@edit')->name('permissions.edit');
    Route::get('/permissions/show/{id}', 'Cms\PermissionsController@show')->name('permissions.show');
    
    Route::post('/permissions/store', 'Cms\PermissionsController@store')->name('permissions.store');
    Route::patch('/permissions/update/{id}', 'Cms\PermissionsController@update')->name('permissions.update');
    Route::delete('/permissions/destroy/{id}', 'Cms\PermissionsController@destroy')->name('permissions.destroy');
    
    Route::get('/roles', 'Cms\RolesController@index')->name('roles.index');
    Route::get('/roles/create', 'Cms\RolesController@create')->name('roles.create');
    Route::get('/roles/{id}/edit', 'Cms\RolesController@edit')->name('roles.edit');
    Route::get('/roles/show/{id}', 'Cms\RolesController@show')->name('roles.show');

    Route::post('/roles/store', 'Cms\RolesController@store')->name('roles.store');
    Route::patch('/roles/update/{id}', 'Cms\RolesController@update')->name('roles.update');
    Route::delete('/roles/destroy/{id}', 'Cms\RolesController@destroy')->name('roles.destroy');

    Route::resource('/pages', 'Cms\PagesController');

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

Route::get('/{slug}', 'FrontPageController@index');

Route::get('/', function () {
    return view('welcome');
});
