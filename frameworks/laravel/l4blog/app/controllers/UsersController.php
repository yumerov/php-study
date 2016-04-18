<?php

class UsersController extends \BaseController
{

    public function login()
    {
        return View::make('users.login');
    }

    public function auth()
    {
        $data = Input::only('username', 'password');
        // dd($data);
        if (Auth::attempt($data)) {
            $response = Redirect::route('home');
        } else {
            Session::flash('message', 'Invalid credentials');
            $response = Redirect::route('login');
        }

        return $response;
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('message', 'Logged out successfully.');
        return Redirect::route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
