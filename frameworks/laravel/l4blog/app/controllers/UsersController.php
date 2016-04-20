<?php

class UsersController extends \BaseController
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::only('username', 'display_name', 'password');
        $redirect = \Input::get('redirect');
        $validator = \Validator::make($data, \User::$rules);

        if ($validator->fails()) {
            $response = \Redirect::to($redirect)
                ->withErrors($validator)
                ->withInput();
        } else {
            \User::create($data);
            Session::flash(
                'message',
                "The user <b>{$data['username']}</b> is registered succesfully."
            );
            $response = \Redirect::to($redirect);
        }

        return $response;
    }

}
