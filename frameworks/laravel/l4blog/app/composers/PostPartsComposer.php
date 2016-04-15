<?php

class PostPartsComposer
{

    public function header($view)
    {
        $data = $view->getData();
        $post = $data['post'];

        $title = $post->title;
        $date = $post->created_at->format('F j, Y');
        $hasCategory = (is_null($post->category) === false);
        $categoryHref = ($hasCategory) ? URL::route('categories.show', $post->category->id) : null;
        $categoryName = ($hasCategory) ? $post->category->name : null;
        $commentsHref = URL::route('posts.show', ['posts' => $post->id])
            . '#comments';

        $view->with(compact(
            'title',
            'date',
            'hasCategory',
            'categoryHref',
            'categoryName',
            'commentsHref'
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
        $href = URL::route('posts.show', ['posts' => $data['post']->id]);
        $classes = 'btn btn-sm btn-primary pull-right';
        $label = 'Read more';
        $isShow = (Route::current()->getName() === 'posts.show');

        $view->with(compact('href', 'classes', 'label', 'isShow'));
    }

}
