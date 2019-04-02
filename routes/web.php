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

Route::get('/home', 'HomeController@index')->name('home');

//route bawaan laravel
// Route::view('/profil', 'user.edit');

Route::get('/profil', 'ProfileController@edit')->name('user.edit');
Route::post('profil', 'ProfileController@update');
Route::delete('profil', 'ProfileController@destroy')->name('avatar.delete');
