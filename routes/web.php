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


Route::get('/toppage', 'ToppageController@showTimetable')->name('top_page');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/addLesson', 'ToppageController@registerLesson')->name('top_page_register_lesson');
Route::get('/addNewLesson/{name}/{day}/{time}', 'ToppageController@registerNewLesson')->name('top_page_register_newlesson');
Route::post('/addTask', 'ToppageController@registerTask')->name('top_page_register_task');
Route::post('/deleteTask', 'ToppageController@deleteTask')->name('top_page_delete_task');
Route::get('/delete/{lesson_id}/{day_id}/{time_id}', 'ToppageController@lessonDelete')->name('lesson_delete');



Route::get('/chat_room/{lesson_id}', 'ChatroomController@showChatroom')->name('chat_room');
Route::post('/chat_room/{lesson_id}/addText', 'ChatroomController@addText')->name('chat_room_add_text');


Auth::routes();











Route::get('/addForm', 'ToppageController@addForm')->name('top_page_add_form');

Route::get('/exeAdd', 'ToppageController@exeAdd')->name('top_page_exe_add');
Route::get('/class_room/{ID}', 'ClassroomController@showInformation')->name('class_room_information');
Route::get('/class_room/{ID}', 'ClassroomController@deleteClass')->name('class_room_delete');
Route::get('/class_room/{ID}', 'ClassroomController@updateInformation')->name('class_room_update');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@register')->name('chat_room_register');
Route::get('/class_room/{ID}/chat_room/{date}', 'ChatroomController@forget')->name('chat_room_forget');

