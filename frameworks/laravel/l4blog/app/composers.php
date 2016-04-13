<?php

View::composer('posts.index', function($view) {
  $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
  $pageTitle = '#L4B';
  $view->with(compact('posts', 'pageTitle'));
});

View::composer('posts.show', function($view) {
  $pageTitle = $view->getData()['post']->title . ' - ' . '#L4B';
  $view->with(compact('pageTitle'));
});

View::composer('posts.create', function($view) {
  $pageTitle = 'Create a post' . ' - ' . '#L4B';
  $view->with(compact('pageTitle'));
});

View::composer('posts.edit', function($view) {
  $pageTitle = 'Edit the post' . ' - ' . '#L4B';
  $view->with(compact('pageTitle'));
});

View::composer('layouts.default', function($view) {
  $nav = [];

  $nav[] = [
    'link' => URL::route('home'),
    'title' => 'Home',
  ];

  $nav[] = [
    'link' => URL::route('posts.create'),
    'title' => 'Create a Post',
  ];

  if (Route::current()->getName() === 'posts.show') {
    $nav[] = [
      'link' => URL::route('posts.edit', [
        'posts' => $view->getData()['post']->id,
      ]),
      'title' => 'Edit the Post',
    ];
  }

  if (Route::current()->getName() === 'posts.edit') {
    $nav[] = [
      'link' => URL::route('posts.show', [
        'posts' => $view->getData()['post']->id,
      ]),
      'title' => 'Show the Post',
    ];
  }


  $blogTitle = '#L4B';

  $view->with(compact('nav', 'blogTitle'));
});