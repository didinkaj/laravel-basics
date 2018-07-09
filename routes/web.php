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

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');
Route::get('/addBlog', 'BlogController@create')->name('addblog');
Route::post('add/blog','BlogController@store')->name('postblog');
Route::get('/blog/{id}','BlogController@show')->where('id', '[0-9]+');
