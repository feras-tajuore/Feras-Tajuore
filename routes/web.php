<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['prefix' => 'user/','middleware' => 'auth'], function () {
    // route Post
    Route::get('/post/trashed','PostController@trashed')->name('post.trashed');
    Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
    Route::get('/post/hdelete/{id}','PostController@hdelete')->name('post.hdelete');
    Route::resource('post','PostController');
    // route Catogory
    Route::resource('/catogory','CatogoriesController');
    // route tag
    Route::resource('/tag', 'tagController');
    // route User
    Route::resource('/user','usersController');
    // route Setting
    Route::get('/settings','SettingsController@index')->name('settings');
    Route::PATCH('/setting/update', 'SettingsController@update')->name('settings.update');
});

// route UserInterface
Route::get('/','SiteUIControlller@index')->name('website');
Route::get('/website/{id}','SiteUIControlller@show')->name('website.show');
// route Home
Route::get('/home', 'HomeController@index')->name('home');



