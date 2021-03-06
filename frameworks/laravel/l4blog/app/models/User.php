<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public static $rules = [
        'username' => 'required|min:3|unique:users,username',
        'display_name' => 'required|min:3',
        'password' => 'required|min:8',
    ];

    protected $fillable = ['username', 'password', 'display_name'];

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

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
