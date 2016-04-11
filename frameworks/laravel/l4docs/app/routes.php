<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# basic

Route::get('/routing/get', function () { return '/routing/get'; });

Route::post('/routing/post', function () { return '/routing/post'; });

Route::match(array('GET', 'POST'), '/routing/get-or-post', function () { return '/routing/get-or-post'; });

# parameters

Route::get('/routing/params/user/{id}', function ($id) { return "User {$id}"; });

Route::get('/routing/params/optional/{user?}', function ($user = 'Batman') { return "User {$user}"; });

Route::get('/routing/params/regex/{name}', function ($name) { return "user: {$name};"; })->where('name', '[A-Za-z]+');

# filters

Route::post('/routing/filters', [
	'before' => 'old',
	function () { return ['success' => true, 'message' => 'congrats, you are over 65.']; }
]);