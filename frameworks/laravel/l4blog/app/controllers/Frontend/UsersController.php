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
            $response = \Redirect::route('dashboard');
        } else {
            Session::flash('message', 'Invalid credentials');
            $response = \Redirect::route('login');
        }

        return $response;
    }

    public function show($id)
    {
        $user = \User::findOrfail($id);
        $posts = \Post::where('author_id', '=', $id)->paginate(3);

        return \View::make('users.show', compact('user', 'posts'));
    }

    public function register()
    {
        return \View::make('users.register');
    }
}
