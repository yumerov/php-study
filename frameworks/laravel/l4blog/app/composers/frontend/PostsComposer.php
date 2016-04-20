<?php

namespace Frontend;

class PostsComposer
{
    public function index($view)
    {
        $posts = \Post::orderBy('created_at', 'DESC')->paginate(3);
        $page = new \stdClass;
        $page->title = '#L4B';
        $view->with(compact('posts', 'page'));
    }

    public function show($view)
    {
        $page = new \stdClass;
        $page->title = $view->getData()['post']->title . ' - ' . '#L4B';
        $view->with(compact('page'));
    }

    public function header($view)
    {
        $data = $view->getData();
        $post = $data['post'];

        $title = $post->title;
        $date = $post->created_at->format('F j, Y');

        $author = new \stdClass;
        $author->has = (is_null($post->author) === false);
        $author->href = (($author->has)
            ? \URL::route('users.show', $post->author_id) : null);
        $author->name = (($author->has) ? $post->author->display_name : null);

        $category = new \stdClass;
        $category->has = (is_null($post->category) === false);
        $category->href = ($category->has)
            ? \URL::route('categories.show', $post->category->id) : null;
        $category->name = ($category->has) ? $post->category->name : null;

        $comments = new \stdClass;
        $comments->href = \URL::route('posts.show', $post->id)
            . '#comments';

        if ($post->comments_count === 0) {
            $comments->label = 'No comments yet';
        } elseif ($post->comments_count === 1) {
            $comments->label = '1 Comment';
        } else {
            $comments->label = "{$post->comments_count} Comments";
        }

        $view->with(compact(
            'title',
            'date',
            'author',
            'category',
            'comments'
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
        $href = \URL::route('posts.show', $post->id);
        $classes = 'btn btn-sm btn-primary pull-right';
        $label = 'Read more';
        $isShow = (\Route::current()->getName() === 'posts.show');
        $comments = $post->comments;
        $commentDeleted = \Session::get('comment-deleted', null);

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
