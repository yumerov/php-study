<?php

Route::get('/', ['uses' => 'PostController@index', 'as' => 'home']);
Route::get('/posts/list', [
    'before' => 'auth',
    'uses' => 'PostController@listAll',
    'as' => 'posts.list']);
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('comments', 'CommentsController');

Route::get('/login', [
    'before' => 'guest',
    'uses' => 'UsersController@login',
    'as' => 'login']);
Route::post('/auth', [
    'before' => 'guest',
    'uses' => 'UsersController@auth',
    'as' => 'auth']);
Route::get('/logout', [
    'before' => 'auth',
    'uses' => 'UsersController@logout',
    'as' => 'logout']);
Route::resource('users', 'UsersController');

Route::get('/admin/posts', 'Admin\\Controllers\\PostsController@index');
