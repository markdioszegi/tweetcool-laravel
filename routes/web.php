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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
//Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/{id}', 'ProfileController@profile')->name('profile');

Route::delete('/tweets/delete/{id}', 'TweetsController@delete')->name('delete');
Route::post('/tweets/store', 'TweetsController@store')->name('store');

//Route::get('/tweets', 'TweetsController@index')->name('tweets');

