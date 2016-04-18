<?php

class LayoutComposer
{
    public function general($view)
    {
        $blogTitle = '#L4B';

        $view->with(compact('blogTitle'));
    }

    public function nav($view)
    {
        $data = $view->getData();
        $nav = [];
        $nav['left'] = [];
        $nav['right'] = [];

        $nav['left'][] = [
            'link' => URL::route('home'),
            'title' => 'Home',
        ];

        if (Auth::check()) {
            $nav['left'][] = [
                'link' => URL::route('posts.create'),
                'title' => 'Create a Post',
            ];

            $nav['left'][] = [
                'link' => URL::route('categories.create'),
                'title' => 'Create a Category',
            ];

            if (Route::current()->getName() === 'posts.show') {
                $nav['left'][] = [
                    'link' => URL::route('posts.edit', [
                        'posts' => $data['post']->id,
                    ]),
                    'title' => 'Edit the Post',
                ];
            }

            if (Route::current()->getName() === 'posts.edit') {
                $nav['left'][] = [
                    'link' => URL::route('posts.show', [
                        'posts' => $data['post']->id,
                    ]),
                    'title' => 'Show the Post',
                ];
            }

            if (Route::current()->getName() === 'categories.show') {
                $nav['left'][] = [
                    'link' => URL::route('categories.edit', $data['category']->id),
                    'title' => 'Edit the Post',
                ];
            }

            if (Route::current()->getName() === 'categories.edit') {
                $nav['left'][] = [
                    'link' => URL::route('categories.show', $data['category']->id),
                    'title' => 'Show the Post',
                ];
            }

            $nav['right'][] = [
                'link' => URL::route('logout'),
                'title' => 'Logout',
            ];
        } else {
            $nav['right'][] = [
                'link' => URL::route('login'),
                'title' => 'Login',
            ];
        }

        $view->with(compact('nav'));
    }

    public function sidebar($view)
    {
        $categories = Category::all();
        $view->with(compact('categories'));
    }
}
