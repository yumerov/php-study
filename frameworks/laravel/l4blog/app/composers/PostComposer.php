<?php

class PostComposer
{
    public function index($view)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        $pageTitle = '#L4B';
        $view->with(compact('posts', 'pageTitle'));
    }

    public function listAll($view)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        $pageTitle = 'Post list' . ' - ' . '#L4B';
        $view->with(compact('posts', 'pageTitle'));
    }

    public function show($view)
    {
        $pageTitle = $view->getData()['post']->title . ' - ' . '#L4B';
        $view->with(compact('pageTitle'));
    }

    public function create($view)
    {
        $pageTitle = 'Create a post' . ' - ' . '#L4B';
        $view->with(compact('pageTitle'));
    }

    public function edit($view)
    {
        $pageTitle = 'Edit the post' . ' - ' . '#L4B';
        $view->with(compact('pageTitle'));
    }

    public function categoryField($view)
    {
        $category_selects = Category::lists('name', 'id');
        $view->with(compact('category_selects'));
    }
}
