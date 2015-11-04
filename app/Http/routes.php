<?php

Route::controllers(['auth' => 'Auth\AuthController']);

Route::group(['middleware' => 'auth'], function() {

    Route::resource('users', 'UserController');
    Route::resource('tests', 'TestController');
    Route::resource('quizzes', 'QuizController');

    Route::get('/quizzes/{quizzes}/matching', [
        'as'   => 'quizzes.matching',
        'uses' => 'QuizController@match'
    ]);

    Route::get('/question', function() {
        $i = Input::get('question_number');

        return view('partials.question', compact('i'));
    });

    Route::get('/', ['uses' => 'QuizController@index']);
});