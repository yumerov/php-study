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
  	return 'implement user storing logic'
  }
  
}
