<?php

class CommentComposer
{
    public function body($view)
    {
        $comment = $view->getData()['comment'];
        $lastCommentId = Session::get('last-comment-id', -1);

        $id = $comment->id;
        $name = $comment->name;
        $body = $comment->body;
        $post_id = $comment->post_id;

        $classes = 'clearfix list-group-item';

        if ((int) $id === (int) $lastCommentId) {
            $classes .= ' list-group-item-warning';
            Session::forget('last-comment-id');
        }

        $editHref = URL::route('admin.comments.edit', $comment->id);

        $view->with(compact(
            'id',
            'name',
            'body',
            'post_id',
            'classes',
            'editHref'
        ));
    }

    public function edit($view)
    {
        $comment = $view->getData()['comment'];
        $post = Post::findOrFail($comment->post_id);
        $pageTitle = "Edit comment with id " . ' -  ' . '#L4B';

        $view->with(compact('post', 'pageTitle'));
    }
}
