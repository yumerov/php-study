<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

  public $timestamps = false;

  public static $rules = ['username' => 'required', 'password' => 'required'];

  public static $messages;

  public static function isValid($data) {
    $validator = Validator::make($data, self::$rules);

    self::$messages = $validator->messages();

    return !$validator->fails();
  }

}
