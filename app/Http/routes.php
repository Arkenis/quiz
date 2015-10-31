<?php

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UserController');
    Route::resource('tests', 'TestController');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('quizzes', [
        'as'   => 'quizzes',
        'uses' => 'QuizController@index'
    ]);
});

