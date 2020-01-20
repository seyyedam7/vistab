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


    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::group(['prefix' => 'teacher'], function () {
        Route::post('/register', 'TeacherController@register')->name('teacher.register');
        Route::post('/login', 'TeacherController@login')->name('teacher.login');
    });
    Route::group(['prefix' => 'student'], function () {
        Route::post('/register', 'StudentController@store');
        Route::put('/register/information', 'StudentController@update');
        Route::post('/register/message', 'StudentController@message');
        Route::post('/login', 'StudentController@login');
    });
    Route::group(['prefix' => 'like'], function () {
        Route::post('/course/store', 'LikeController@store');
        Route::post('/course/human', 'LikeController@human');
        Route::post('/course/count', 'LikeController@count');
        Route::get('/course/top', 'LikeController@top');
    });
    Route::group(['prefix' => 'target'], function () {
        Route::post('/course/store', 'TargetController@course');
        Route::post('/course/show', 'TargetController@target');
    });
    Route::group(['prefix' => 'course'], function () {
        Route::post('/', 'CourseController@store');
        Route::post('/fresh', 'CourseController@list');
        Route::post('/status/', 'CourseController@status');
        Route::post('/student', 'StudentController@course');
        Route::post('/search/', 'SearchController@course');
    });
    Route::group(['prefix' => 'group'], function () {
        Route::post('/', 'GroupController@store');
        Route::post('/student', 'StudentController@group');
    });
});


//Route::post('/comment','CommentController@store');
//Route::post('/comments','CommenstController@store');






