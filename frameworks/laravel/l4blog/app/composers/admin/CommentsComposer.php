<?php

namespace Admin;

class CommentsComposer
{
    public function row($view)
    {
        $comment = $view->getData()['comment'];

        $id = $comment->id;
        $post = (is_null($comment->post) === false) ?
            $comment->post->title : null;
        $name = $comment->name;
        $created_at = $comment->created_at->format('H:m F j, Y');
        $hrefs = new \stdClass;

        if (is_null($post) === false) {
            $hrefs->view = \URL::route('posts.show', [
                'posts' => $comment->post->id,
                '#comment-' . $id,
            ]);
        } else {
            $hrefs->view = null;
        }

        $hrefs->edit = \URL::route('admin.comments.edit', $id);
        $deleteForm = [
            'route' => ['admin.comments.destroy', $id],
            'method' => 'delete',
            'class' => 'pull-left',
            'id' => 'delete-' . $id,
        ];

        $view->with(compact(
            'id',
            'post',
            'name',
            'created_at',
            'hrefs',
            'deleteForm'
        ));
    }
}
