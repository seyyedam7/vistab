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


Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix' => 'course'] , function (){
   Route::get('add' , 'CourseController@create')->name('course.create');
   Route::get('show/{id}' , 'CourseController@show')->name('course.show');
   Route::get('list' , 'CourseController@index')->name('course.list');
   Route::post('add' , 'CourseController@store')->name('course.store');
});
