<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('API')->group(function () {

    Route::group(['prefix' => 'student'], function () {

        Route::post('/register', 'AuthController@store')->name('student.register');
        Route::put('/register/information', 'AuthController@update')->name('student.information')->middleware('auth:api');
        Route::post('/register/message', 'AuthController@message')->name('student.message');
        Route::post('/login', 'AuthController@login')->name('student.login');
        Route::post('/logout', 'AuthController@logout')->name('student.logout');
    });

    Route::middleware('auth:api')->group(function () {

        Route::group(['prefix' => 'like'], function () {
            Route::post('/course/store', 'LikeController@store')->name('like.store');
            Route::post('/course/human', 'LikeController@human')->name('like.human');
            Route::post('/course/count', 'LikeController@count')->name('like.count');
            Route::get('/course/top', 'LikeController@top')->name('like.human');
        });

        Route::group(['prefix' => 'target'], function () {
            Route::post('/course/store', 'TargetController@course')->name('target.store');
            Route::post('/course/index', 'TargetController@index')->name('target.index');
        });

        Route::group(['prefix' => 'course'], function () {
            Route::post('/', 'CourseController@store')->name('course.store');
            Route::get('/fresh', 'CourseController@list')->name('search.list');
            Route::post('/status/', 'CourseController@status')->name('search.status');
            Route::post('/student', 'StudentController@course')->name('search.course');
            Route::post('/search/', 'SearchController@course')->name('search.course');
        });

        Route::group(['prefix' => 'group'], function () {
            Route::post('/', 'GroupController@store')->name('group.store');
            Route::post('/student', 'StudentController@group')->name('student.group');
        });
        Route::group(['prefix' => 'setting'], function (){
            Route::put('/password','SettingController@password');
        });
    });
});

//Route::post('/comment','CommentController@store');
//Route::post('/comments','CommenstController@store');






