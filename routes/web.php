<?php

Route::middleware(['auth'])->group(function () {
    Route::get('/question/{id}', 'QuestionController@show')->name('get_question');
    Route::get('/stat', 'QuestionController@getStat')->name('get_stat');
    Route::post('/check-answer', 'QuestionController@checkAnswer')->name('saveAnswer');
});
Auth::routes();

