<?php

class LayoutComposer
{
    public function general($view)
    {
        $blog = new \stdClass;
        $blog->title = '#l4b';
        $blog->description = '#description';
        $blog->footer = 'Basic blog platform build with Laravel 4 and '
            . 'Bootstrap 3.';

        $page = new \stdClass;
        $page->title = '#title';

        $view->with(compact('blog', 'page'));
    }

    public function nav($view)
    {
        $data = $view->getData();
        $nav = [];
        $nav['left'] = [];
        $nav['right'] = [];
        $currentRoute = Route::current()->getName();
        $home = [
            'link' => URL::route('home'),
            'title' => 'Home',
        ];

        if (Auth::check()) {
            $nav['left'][] = [
                'link' => URL::route('dashboard'),
                'title' => 'Dashboard',
            ];

            $nav['left'][] = [
                'childs' => [
                    [
                        'link' => URL::route('admin.posts.index'),
                        'title' => 'All',
                    ],
                    [
                        'link' => URL::route('admin.posts.create'),
                        'title' => 'Create',
                    ],
                ],
                'title' => 'Posts',
                'link' => '#',
            ];
            $nav['left'][] = [
                'childs' => [
                    [
                        'link' => URL::route('admin.categories.index'),
                        'title' => 'All',
                    ],
                    [
                        'link' => URL::route('admin.categories.create'),
                        'title' => 'Create',
                    ],
                ],
                'title' => 'Categories',
                'link' => '#',
            ];

            $nav['left'][] = [
                'childs' => [
                    [
                        'link' => URL::route('admin.comments.index'),
                        'title' => 'All',
                    ],
                    [
                        'link' => URL::route('admin.comments.create'),
                       'title' => 'Create',
                    ],
                ],
                'title' => 'Comments',
                'link' => '#',
            ];

            $nav['left'][] = [
                'childs' => [
                    [
                        'link' => URL::route('admin.users.index'),
                        'title' => 'All',
                    ],
                    [
                        'link' => URL::route('admin.users.create'),
                       'title' => 'Create',
                    ],
                ],
                'title' => 'Users',
                'link' => '#',
            ];

            if ($currentRoute === 'posts.show') {
                $nav['left'][] = [
                    'link' => URL::route('admin.posts.edit', $data['post']->id),
                    'title' => 'Edit the Post',
                ];
            }

            if ($currentRoute === 'admin.posts.edit') {
                $nav['left'][] = [
                    'link' => URL::route('posts.show', $data['post']->id),
                    'title' => 'Show the Post',
                ];
            }

            if ($currentRoute === 'categories.show') {
                $nav['left'][] = [
                    'link' => URL::route(
                        'admin.categories.edit',
                        $data['category']->id
                    ),
                    'title' => 'Edit the Post',
                ];
            }

            if ($currentRoute === 'admin.categories.edit') {
                $nav['left'][] = [
                    'link' => URL::route(
                        'categories.show',
                        $data['category']->id
                    ),
                    'title' => 'Show the Post',
                ];
            }

            $nav['right'][] = $home;

            $nav['right'][] = [
                'link' => URL::route('admin.users.edit', Auth::id()),
                'title' => 'Profile',
            ];

            $nav['right'][] = [
                'link' => URL::route('logout'),
                'title' => 'Logout',
            ];
        } else {
            $nav['left'][] = $home;
            $nav['right'][] = [
                'link' => URL::route('login'),
                'title' => 'Login',
            ];
            $nav['right'][] = [
                'link' => URL::route('register'),
                'title' => 'Register',
            ];
        }

        $view->with(compact('nav'));
    }
}
