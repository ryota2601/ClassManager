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

Route::get('/login', 'UserController@showForm')->name('login');
Route::post('/logout', 'UserController@showForm')->name('logout');
Route::get('/register', 'UserController@showForm')->name('register');
Route::get('/forget', 'UserController@ahowForm')->name('forget');
Route::get('/', 'ToppageController@showTimetable')->name('top_page');
Route::post('/class_room', 'ClassroomController@addClass')->name('class_room_add');
Route::get('/class_room/{ID}', 'ClassroomController@showInformation')->name('class_room_information');
Route::get('/class_room/{ID}', 'ClassroomController@deleteClass')->name('class_room_delete');
Route::get('/class_room/{ID}', 'ClassroomController@updateInformation')->name('class_room_update');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@showForm')->name('chat_room_register');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@ahowForm')->name('chat_room_forget');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


