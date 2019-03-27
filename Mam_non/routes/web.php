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
Route::get('login','HomeController@Login')->name('Login');
Route::post('login','HomeController@insertLogin')->name('post.login');

Route::group(['middleware' => ['Mymiddleware']], function () {
 
	//Register
	Route::get('register','HomeController@Register')->name('register');
	Route::post('register','HomeController@insertRegister')->name('insertRegister');

	//Dashbroad
	 Route::get('dashbroad','DashbroadController@Dashbroad')->name('dashbroad');
	 //Class
	 Route::get('class/create','DashbroadController@createClass')->name('createClass');
	 Route::post('class/create','DashbroadController@insertClass')->name('insertClass');
	 Route::get('class/edit/{id}','DashbroadController@editClass')->name('editClass')->where('id', '[0-9]+');
	 Route::post('class/edit/{id}','DashbroadController@updateClass')->name('updateClass')->where('id', '[0-9]+');
	 Route::get('class','DashbroadController@Class')->name('Class');
	 Route::post('class','DashbroadController@postClass')->name('postClass');
	 //Teacher
	 Route::get('teacher/create','DashbroadController@createTeacher')->name('createTeacher');
	 Route::post('teacher/create','DashbroadController@insertTeacher')->name('insertTeacher');
	 Route::get('teacher/edit/{id}','DashbroadController@editTeacher')->name('editTeacher');
	 Route::post('teacher/edit/{id}','DashbroadController@updateTeacher')->name('updateTeacher');
	 Route::get('teacher','DashbroadController@Teacher')->name('Teacher');
	 // Route::post('teacher','DashbroadController@postTeacher')->name('postTeacher');
	 Route::post('teacher/destroy/{id}','DashbroadController@destroyTeacher')->name('destroyTeacher');
	 Route::post('class/destroy/{id}','DashbroadController@destroyClass')->name('destroyClass');
 });
 //admin-logout
 Route::get('logout','HomeController@logout')->name('logout');
