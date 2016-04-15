<?php

Route::get('/', ['uses' => 'PostController@index', 'as' => 'home']);
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('comments', 'CommentsController');
