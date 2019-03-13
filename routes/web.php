<?php

Route::get('/question/{id}', 'QuestionController@show');
Route::post('/question/{id}', 'QuestionController@store')->name('save_answer');
Auth::routes();

