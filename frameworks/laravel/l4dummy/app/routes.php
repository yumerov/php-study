<?php

Route::get('/users', 'UsersController@index');

Route::get('/users/orm', 'OrmController@all');

Route::get('/users/orm/find', 'OrmController@find');

Route::get('/users/orm/create', 'OrmController@create');

Route::get('/users/orm/update', 'OrmController@update');

Route::get('/users/orm/order', 'OrmController@order');

Route::get('/blade/user/{id}', 'BladeController@user');

Route::get('/blade/users', 'BladeController@users');