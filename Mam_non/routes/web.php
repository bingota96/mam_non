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
//admin login route
Route::get('login','HomeController@Login');
Route::post('login','HomeController@insertLogin')->name('post.login');
Route::get('register','HomeController@Register')->name('register');
Route::post('register','HomeController@insertRegister')->name('insertRegister');

//Dashbroad
 Route::get('dashbroad','DashbroadController@Dashbroad')->name('dashbroad');

