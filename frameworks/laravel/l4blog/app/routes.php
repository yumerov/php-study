<?php

Route::get('/', ['uses' => 'PostController@index', 'as' => 'home']);
Route::resource('posts', 'PostController');