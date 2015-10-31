<?php

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UserController');
    Route::resource('quizzes', 'QuizController');

    Route::get('/', function () {
        return view('welcome');
    });
});

