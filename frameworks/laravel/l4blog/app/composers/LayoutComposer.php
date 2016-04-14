<?php

class LayoutComposer
{
    public function general($view)
    {
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
    }

    public function sidebar($view)
    {
        $categories = Category::all();
        $view->with(compact('categories'));
    }
}
