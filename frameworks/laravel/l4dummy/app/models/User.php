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

  protected $fillable = ['username', 'password'];

  public static $rules = ['username' => 'required', 'password' => 'required'];

  public $errors;

  public function isValid() {
    $validator = Validator::make($this->attributes, self::$rules);

    $this->errors = $validator->messages();

    return !$validator->fails();
  }

}
