<?php

class OrmController extends \BaseController {

	public function all () {
		$users = User::all();

		return $users;
	}

	public function find () {
		$users = User::find(2);

		return $users;
	}

	public function create () {
		$user = new User();
		$user->username = 'ramm';
		$user->password = Hash::make('stein');
		$user->save();

		return User::all();
	}

	public function update () {
		$user = User::find(2);
		$user->username = 'updated::' .rand(1, 10);
		$user->save();

		return User::all();
	}

	public function order () {
		return User::orderBy('username', 'asc')->get();
	}

}
