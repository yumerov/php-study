<?php

View::composer('posts.index', function ($view) {
    $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
    $pageTitle = '#L4B';
    $view->with(compact('posts', 'pageTitle'));
});

View::composer('posts.show', function ($view) {
    $pageTitle = $view->getData()['post']->title . ' - ' . '#L4B';
    $view->with(compact('pageTitle'));
});

View::composer('posts.create', function ($view) {
    $pageTitle = 'Create a post' . ' - ' . '#L4B';
    $view->with(compact('pageTitle'));
});

View::composer('posts.edit', function ($view) {
    $pageTitle = 'Edit the post' . ' - ' . '#L4B';
    $view->with(compact('pageTitle'));
});

View::composer('layouts.default', function ($view) {
    $data = $view->getData();
    $nav = [];

    $nav[] = [
        'link' => URL::route('home'),
        'title' => 'Home',
    ];

    $nav[] = [
        'link' => URL::route('posts.create'),
        'title' => 'Create a Post',
    ];

    $nav[] = [
        'link' => URL::route('categories.create'),
        'title' => 'Create a Category',
    ];

    if (Route::current()->getName() === 'posts.show') {
        $nav[] = [
            'link' => URL::route('posts.edit', [
                'posts' => $data['post']->id,
            ]),
            'title' => 'Edit the Post',
        ];
    }

    if (Route::current()->getName() === 'posts.edit') {
        $nav[] = [
            'link' => URL::route('posts.show', [
                'posts' => $data['post']->id,
            ]),
            'title' => 'Show the Post',
        ];
    }

    if (Route::current()->getName() === 'categories.show') {
        $nav[] = [
            'link' => URL::route('categories.edit', $data['category']->id),
            'title' => 'Edit the Post',
        ];
    }

    if (Route::current()->getName() === 'categories.edit') {
        $nav[] = [
            'link' => URL::route('categories.show', $data['category']->id),
            'title' => 'Show the Post',
        ];
    }

    $blogTitle = '#L4B';

    $view->with(compact('nav', 'blogTitle'));
});

View::composer('parts.sidebar', function ($view) {
    $categories = Category::all();
    $view->with(compact('categories'));
});

View::composer('categories.show', function ($view) {
    $data = $view->getData();
    $category = $data['category'];
    $pageTitle = $category->name . ' - ' . '#L4B';
    $posts = Post::where('category_id', '=', $category->id)->paginate(3);
    $view->with(compact('pageTitle', 'posts'));
});

View::composer('categories.edit', function ($view) {
    $pageTitle = 'Edit the category' . ' - ' . '#L4B';
    $view->with(compact('pageTitle'));
});

View::composer('categories.create', function ($view) {
    $pageTitle = 'Create a category' . ' - ' . '#L4B';
    $view->with(compact('pageTitle'));
});
