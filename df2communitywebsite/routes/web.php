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

Route::get('/', "PagesController@index");
Route::resource('posts', 'PostController');
Route::resource('users', 'SettingsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/settings', 'SettingsController@index');

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

Route::get('/posts/{category}', 'PostController@filter');
