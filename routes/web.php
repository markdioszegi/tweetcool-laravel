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

Auth::routes();

// Home
Route::get('/', 'HomeController@index')->name('home');

// Profile
//Route::get('/users', 'HomeController@users')->name('users');
//Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/{id}', 'ProfileController@profile')->name('profile');

// Tweets
Route::delete('/tweets/delete/{id}', 'TweetController@delete')->name('delete');
Route::post('/tweets/store', 'TweetController@store')->name('store');
Route::get('/tweets/{id}/edit', 'TweetController@edit')->name('edit');
Route::put('/tweets/{id}', 'TweetController@update')->name('update');


// Comments
Route::post('/comments/store', 'CommentController@store')->name('store');
Route::delete('/comments/delete/{id}', 'CommentController@delete')->name('delete');
Route::put('/comments/{id}', 'CommentController@update')->name('update');

//Route::get('/tweets', 'HomeController@tweets')->name('tweets');
//Route::get('/tweets', 'TweetController@index')->name('tweets');

