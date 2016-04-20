<?php

namespace Admin;

class UsersController extends \BaseController
{

    public function logout()
    {
        \Auth::logout();
        \Session::flash('message', 'Logged out successfully.');
        return \Redirect::route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $posts = \User::paginate(3);
        return \View::make('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('admin.users.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = \User::findOrFail($id);
        return \View::make('users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = \User::findOrFail($id);

        $new = [];
        $rules = [];
        $data = \Input::only('username', 'display_name', 'password');
        $new['display_name'] = $data['display_name'];
        $rules['display_name'] = \User::$rules['display_name'];

        if ($user->username !== $data['username']) {
            $new['username'] = $data['username'];
            $rules['username'] = \User::$rules['username'];
        }

        if (!empty($data['password'])) {
            $new['password'] = $data['password'];
            $rules['password'] = \User::$rules['password'];
        }

        $validator = \Validator::make($new, $rules);
        $redirect = \Redirect::route('admin.users.edit', $id);

        if ($validator->fails()) {
            $response = $redirect
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = $user->update($new);
            $response = $redirect
                ->with('success', 'The profile is updated successfully.');
        }

        return $response;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = \User::findOrFail($id);
        \User::destroy($id);
        return \Redirect::route('dashboard')->with(
            'message',
            "User with id {$id} is deleted successfully."
        );
    }
}
