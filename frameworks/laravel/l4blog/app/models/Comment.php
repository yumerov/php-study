<?php

class Comment extends \Eloquent
{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'body', 'post_id'];

    public static $rules = [
        'name' => 'required|min:3',
        'body' => 'required|min:3',
    ];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            $comment->post->increment('comments_count', 1);
        });

        static::deleting(function ($comment) {
            $comment->post->decrement('comments_count', 1);
        });
    }

}
