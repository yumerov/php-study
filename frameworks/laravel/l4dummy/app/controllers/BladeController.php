<?php

class BladeController extends \BaseController {

	public function user ($id) {
		$user = User::find($id);

		return View::make('users.view', ['user' => $user]);
	}

	public function users () {
		$users = User::all();

		 return View::make('users.index', ['users' => $users]);
		// return View::make('users.index')->with('users', $users);
	}

}
