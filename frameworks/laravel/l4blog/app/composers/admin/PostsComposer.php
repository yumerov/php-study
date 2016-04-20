<?php

namespace Admin;

class PostsComposer
{
    public function row($view)
    {
        $post = $view->getData()['post'];

        $id = $post->id;
        $title = $post->title;
        $created_at = $post->created_at->format('H:m F j, Y');
        $hrefs = new \stdClass;
        $hrefs->view = \URL::route('posts.show', $id);
        $hrefs->edit = \URL::route('admin.posts.edit', $id);
        $deleteForm = [
            'route' => ['admin.posts.destroy', $id],
            'method' => 'delete',
            'class' => 'pull-left',
            'id' => 'delete-' . $id,
        ];

        $view->with(compact(
            'id',
            'title',
            'created_at',
            'hrefs',
            'deleteForm'
        ));
    }

    public function index($view)
    {
        $posts = \Post::orderBy('created_at', 'DESC')->paginate(3);
        $page = new \stdClass;
        $page->title = 'Post list' . ' - ' . '#L4B';
        $view->with(compact('posts', 'page'));
    }

    public function edit($view)
    {
        $page = new \stdClass;
        $page->title = 'Edit the post' . ' - ' . '#L4B';
        $view->with(compact('page'));
    }

    public function create($view)
    {
        $page = new \stdClass;
        $page->title = 'Create a post' . ' - ' . '#L4B';
        $view->with(compact('page'));
    }

    public function categoryField($view)
    {
        $category_selects = \Category::lists('name', 'id');
        $view->with(compact('category_selects'));
    }
}
