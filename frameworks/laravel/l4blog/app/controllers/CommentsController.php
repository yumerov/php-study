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

    /**
     * Show the form for editing the specified resource.
     * GET /comments/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return View::make('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /comments/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $comment = Comment::findOrFail($id);
        $data = Input::all();
        $validator = Validator::make($data, Comment::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('comments.edit', [
                'posts' => $id,
                '#edit-comment',
            ])
                ->withErrors($validator)
                ->withInput();
        } else {
            $comment->update($data);
            $response = Redirect::route('posts.show', [
                'posts' => $data['post_id'],
                '#comment-' . $comment->id,
            ]);
            Session::put('last-comment-id', $comment->id);
        }

        return $response;

    }

    /**
     * Remove the specified resource from storage.
     * DELETE /comments/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post_id;
        Category::destroy($id);
        Session::flash(
            'comment-deleted',
            "The comment with id {$id} is deleted successfully.");
        return Redirect::route('posts.show', [
            'posts' => $post_id,
            '#comments']);
    }

}
