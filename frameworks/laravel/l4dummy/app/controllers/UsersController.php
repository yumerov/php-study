<?php

class UsersController extends \BaseController {

  public function index () {
    $users = DB::table('users')->get();

    return $users;
  }
  
}
