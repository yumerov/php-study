<?php

namespace Frontend;

class UsersController extends \BaseController
{
    public function login()
    {
        return \View::make('users.login');
    }

    public function auth()
    {
        $data = \Input::only('username', 'password');
        if (\Auth::attempt($data)) {
            $response = \Redirect::route('home');
        } else {
            Session::flash('message', 'Invalid credentials');
            $response = \Redirect::route('login');
        }

        return $response;
    }
}
