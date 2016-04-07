<?php

class UsersController extends \BaseController {

  public function index () {    
    $users = User::all();

    return View::make('rest.index', ['users' => $users]);
  }

  public function show ($id) {
  	$user = User::find($id);

  	return View::make('rest.show', ['user' => $user]);
  }

  public function create () {
  	return View::make('rest.create');
  }

  public function store () {
    $data = Input::all();

    if (User::isValid($data)) {
      $user = new User();
      $user->username = Input::get('username');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      $response = Redirect::route('users.index');
    } else {
      $response = Redirect::back()->withInputs($data)->withErrors(User::$messages);
    }

    return $response;
  }
  
}
