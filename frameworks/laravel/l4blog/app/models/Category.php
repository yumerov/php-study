<?php

class Category extends \Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany('Post');
    }

}
