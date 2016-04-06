<?php

Route::get('/users', function () {
    $users = DB::table('users')->get();

    return $users;
});