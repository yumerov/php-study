<?php

class Category extends \Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description'];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'min:3',
    ];

    public function posts()
    {
        return $this->hasMany('Post');
    }

}
