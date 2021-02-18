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

Route::get('/login', 'UserController@login')->name('login');
Route::post('/logout', 'UserController@logout')->name('logout');
Route::get('/register', 'UserController@register')->name('register');
Route::get('/forget', 'UserController@forget')->name('forget');
Route::get('/', 'ToppageController@showTimetable')->name('top_page');



Route::get('/addForm', 'ToppageController@≈')->name('top_page_add_form');
Route::post('/', 'ToppageController@≈')->name('top_page_register_form');


Route::get('/exeAdd', 'ToppageController@exeAdd')->name('top_page_exe_add');
Route::get('/class_room/{ID}', 'ClassroomController@showInformation')->name('class_room_information');
Route::get('/class_room/{ID}', 'ClassroomController@deleteClass')->name('class_room_delete');
Route::get('/class_room/{ID}', 'ClassroomController@updateInformation')->name('class_room_update');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@register')->name('chat_room_register');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@forget')->name('chat_room_forget');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
=======

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> cf18f4c4f0affeb21f8dd5858120c2cd8da553ad
