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

/*
    Frontend
*/
Route::get('/', 'PublicController@index')->name('post.index');
Route::get('/post/show/{post:slug}', 'PublicController@show')->name('post.show');
Route::get('/category/show/{category}', 'PublicController@category')->name('category.show');

/*
    Autentication
*/
Auth::routes();

/*
    Backend
*/

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/post', 'PostController@index')->name('post');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/edit/{post:slug}', 'PostController@edit')->name('post.edit');
    Route::patch('/post/update/{post:slug}', 'PostController@update')->name('post.update');
    Route::delete('/post/destroy/{post:slug}', 'PostController@destroy')->name('post.destroy');
});