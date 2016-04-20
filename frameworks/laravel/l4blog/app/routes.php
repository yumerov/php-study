<?php


Route::get('/logout', [
    'before' => 'auth',
    'uses' => 'UsersController@logout',
    'as' => 'logout']);

# common
Route::post('comments', [
    'uses' => 'CommentsController@store',
    'as' => 'comments.store',
]);
Route::resource('users', 'UsersController');

# frontend
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['uses' => 'PostsController@index', 'as' => 'home']);
    Route::get('/posts/{id}', [
        'uses' => 'PostsController@show',
        'as' => 'posts.show',
    ]);
    Route::get('/categories/{id}', [
        'uses' => 'CategoriesController@show',
        'as' => 'categories.show',
    ]);
    Route::get('/login', [
        'uses' => 'UsersController@login',
        'as' => 'login',
    ]);
    Route::post('/auth', [
        'before' => 'guest',
        'uses' => 'UsersController@auth',
        'as' => 'auth',
    ]);
});

# admin
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'before' => 'auth'], function () {
    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard',
    ]);
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('comments', 'CommentsController');
});
