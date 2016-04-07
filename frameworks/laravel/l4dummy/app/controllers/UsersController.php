<?php

class UsersController extends \BaseController {

  public function __construct (User $user) {
    $this->user = $user;
  }

  public function index () {    
    $users = $this->user->all();

    return View::make('rest.index', ['users' => $users]);
  }

  public function show ($id) {
  	$user = $this->user->find($id);

  	return View::make('rest.show', ['user' => $user]);
  }

  public function create () {
  	return View::make('rest.create');
  }

  public function store () {
    $data = Input::all();

    if ($this->user->fill($data)->isValid()) {
      $this->user->save();
      $response = Redirect::route('users.index');
    } else {
      $response = Redirect::back()->withInputs($data)->withErrors($this->user->errors);
    }

    return $response;
  }
  
}
