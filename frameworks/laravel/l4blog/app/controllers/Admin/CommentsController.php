<?php

namespace Admin;

class CommentsController extends \BaseController
{
    public function index()
    {
        $comments = \Comment::orderBy('created_at', 'DESC')->paginate(3);
        $page = new \stdClass;
        $page->title = 'Post list' . ' - ' . '#L4B';
        return \View::make('admin.comments.index')
            ->with(compact('page', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $posts = \Post::lists('title', 'id');
        return \View::make('comments.create')->with(compact('posts'));
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
        $comment = \Comment::findOrFail($id);
        return \View::make('comments.edit', compact('comment'));
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
        $comment = \Comment::findOrFail($id);
        $data = \Input::all();
        $validator = \Validator::make($data, \Comment::$rules);

        if ($validator->fails()) {
            $response = \Redirect::route('comments.edit', [
                'posts' => $id,
                '#edit-comment',
            ])
                ->withErrors($validator)
                ->withInput();
        } else {
            $comment->update($data);
            $response = \Redirect::route('posts.show', [
                'posts' => $data['post_id'],
                '#comment-' . $comment->id,
            ]);
            \Session::put('last-comment-id', $comment->id);
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
        $comment = \Comment::findOrFail($id);
        $post_id = $comment->post_id;
        \Comment::destroy($id);
        \Session::flash(
            'comment-deleted',
            "The comment with id {$id} is deleted successfully."
        );
        return \Redirect::route('posts.show', [
            'posts' => $post_id,
            '#comments'
        ]);
    }
}
