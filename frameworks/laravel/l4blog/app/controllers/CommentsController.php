<?php

class CommentsController extends \BaseController
{

    /**
     * Store a newly created resource in storage.
     * POST /comments
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $validator = Validator::make($data, Comment::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('posts.show', [
                'posts' => $data['post_id'],
                '#new-comment',
            ])
                ->withErrors($validator)
                ->withInput();
        } else {
            $comment = Comment::create($data);
            $response = Redirect::route('posts.show', [
                'posts' => $data['post_id'],
                '#comment-' . $comment->id,
            ]);
            Session::flash('last-comment-id', $comment->id);
        }

        return $response;
    }
}
