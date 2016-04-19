<?php

class PostPartsComposer
{

    public function header($view)
    {
        $data = $view->getData();
        $post = $data['post'];

        $title = $post->title;
        $date = $post->created_at->format('F j, Y');

        $hasAuthor = (is_null($post->author) === false);
        $authorHref = (($hasAuthor) ? '#authorHref' : null);
        $authorName = (($hasAuthor) ? $post->author->display_name : null);

        $hasCategory = (is_null($post->category) === false);
        $categoryHref = ($hasCategory) ? URL::route('categories.show', $post->category->id) : null;
        $categoryName = ($hasCategory) ? $post->category->name : null;
        $commentsHref = URL::route('posts.show', ['posts' => $post->id])
            . '#comments';

        if ($post->comments_count === 0) {
            $commentsLabel = 'No comments yet';
        } elseif ($post->comments_count === 1) {
            $commentsLabel = '1 Comment';
        } else {
            $commentsLabel = "{$post->comments_count} Comments";
        }

        $view->with(compact(
            'title',
            'date',
            'hasAuthor',
            'authorName',
            'authorHref',
            'hasCategory',
            'categoryHref',
            'categoryName',
            'commentsHref',
            'commentsLabel'
        ));
    }

    public function body($view)
    {
        $post = $view->getData()['post'];

        $image = $post->image;
        $body = $post->body;
        $view->with(compact('image', 'body'));
    }

    public function footer($view)
    {
        $data = $view->getData();
        $post = $data['post'];
        $href = URL::route('posts.show', $post->id);
        $classes = 'btn btn-sm btn-primary pull-right';
        $label = 'Read more';
        $isShow = (Route::current()->getName() === 'posts.show');
        $comments = $post->comments;
        $commentDeleted = Session::get('comment-deleted', null);

        $view->with(compact(
            'href',
            'classes',
            'label',
            'isShow',
            'comments',
            'commentDeleted'
        ));
    }
}