<?php

Route::get('/users', function () {
    $users = DB::table('users')->get();

    return $users;
});

Route::get('/users/orm', function () {
    $users = User::all();

    return $users;
});

Route::get('/users/orm/find', function () {
    $users = User::find(2);

    return $users;
});

Route::get('/users/orm/create', function () {
    $user = new User();
    $user->username = 'ramm';
    $user->password = Hash::make('stein');
    $user->save();

    return User::all();
});

Route::get('/users/orm/update', function () {
    $user = User::find(2);
    $user->username = 'updated::' .rand(1, 10);
    $user->save();

    return User::all();
});

Route::get('/users/orm/order', function () {
    return User::orderBy('username', 'asc')->get();
});