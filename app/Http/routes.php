<?php

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UserController');
    Route::resource('tests', 'TestController');
    Route::resource('quizzes', 'QuizController');

    Route::get('/question', function() {
        $i = Input::get('question_number');

        return view('partials.question', compact('i'));
    });

    Route::get('/', function () {
        return view('welcome');
    });
});

