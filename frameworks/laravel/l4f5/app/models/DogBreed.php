<?php

/**
 * @author Levent Yumerov <yumerov.levent@gmail.com>
 */
class DogBreed extends \Eloquent
{
	protected $fillable = ['name', 'description'];

    public function dogs()
    {
        return $this->hasMany('Dog');
    }
}