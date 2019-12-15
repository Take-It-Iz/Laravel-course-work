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

Route::resource('group/{grpid}/students', "StudentsController");
Route::resource('groups', "GroupController");
Route::get('/', "PagesControler@home");
Route::get('/about', "PagesControler@about");
Route::get('/students/group/{id}', "StudentsController@index");
Route::get('/admin', 'PagesControler@admin')->middleware('auth');

//Route::get('/students', "StudentsController@index");
//Route::get('/students/create', "StudentsController@create");
//Route::get('/students/{id}/edit', "StudentsController@edit");
//Route::get('/students-json', "StudentsController@getList");
//Route::get('/students/{id}', "StudentsController@show");
//Route::patch('/students/{id}', "StudentsController@update");
//Route::post('/students', "StudentsController@store");
Route::delete('/students/{id}', "StudentsController@destroy");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
