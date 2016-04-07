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

Route::get('/blade/users/{id}', function ($id) {
    $user = User::find($id);

     return View::make('users.view', ['user' => $user]);
});

Route::get('/blade/users', function () {
    $users = User::all();

     return View::make('users.index', ['users' => $users]);
    // return View::make('users.index')->with('users', $users);
});