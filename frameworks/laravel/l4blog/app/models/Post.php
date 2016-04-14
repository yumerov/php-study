<?php

class Post extends \Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public static $rules = [
        'title' => 'required|min:3',
        'category_id' => 'required|exists:categories,id',
        'body' => 'required|min:3',
    ];

    protected $fillable = ['title', 'body', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo('Category');
    }
}
