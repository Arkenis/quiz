<?php

Route::get('quizzes', [
    'as'   => 'quizzes',
    'uses' => 'QuizController@index'
]);