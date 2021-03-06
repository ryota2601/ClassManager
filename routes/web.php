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



Route::get('/addForm', 'ToppageController@addForm')->name('top_page_add_form');
Route::post('/', 'ToppageController@registerLesson')->name('top_page_register_lesson');
Route::post('/addTask/{lesson_id}', 'ToppageController@registerTask')->name('top_page_register_task');
Route::get('/delete/{day_id}/{time_id}', 'ToppageController@lessonDelete')->name('lesson_delete');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
