<?php

class Post extends \Eloquent {

	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

  public static $rules = [
    'title' => 'required|min:3',
    'body' => 'required|min:3',
  ];

  protected $fillable = ['title', 'body',];

}
