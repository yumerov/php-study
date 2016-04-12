<?php

class Post extends \Eloquent {

  public static $rules = [
    'title' => 'required|min:3',
    'body' => 'required|min:3',
  ];

  protected $fillable = ['title', 'body',];

}
