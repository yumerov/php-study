<?php

class Category extends \Eloquent
{

    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany('Post');
    }

}
