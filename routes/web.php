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
Route::resource('products', 'ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function() {
        return view('backend.index');
    });
});
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::delete('authors/mass_destroy', 'AuthorsController@massDestroy')->name('authors.mass_destroy');
    Route::resource('authors', 'AuthorsController');
    Route::resource('books', 'Bookscontroller');
    Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('posts', 'PostController');
	Route::resource('permissions','PermissionController');
});
