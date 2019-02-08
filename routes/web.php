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

Route::get('/', 'UserController@index');//->middleware('auth');

Route::resource('/adduser', 'UserController');

//Route::get('/addNewuser', 'UserController@store');

//Route::resource('adduser/{id}', 'UserController@update');

Route::post('/search', 'UserController@find'); //

Route::get('ProAndAm/{id}','DependentDropdownController@ProAndAm');

Route::get('/create', 'DependentDropdownController@index')->middleware('auth');

Route::get('/createPro', 'ProvinceController@index')->middleware('auth');

Route::resource('addPro', 'ProvinceController');

Route::get('/createAmp', 'AmphurController@index')->middleware('auth');

Route::resource('addAmp', 'AmphurController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/changepassword','HomeController@showChangePasswordForm');

//Route::get('change','UserController@changePassword');

Route::post('/changePassword','UserController@changePassword')->name('changePassword');
