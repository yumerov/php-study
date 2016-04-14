<?php

class CategoryComposer
{

    public function show($view)
    {
        $data = $view->getData();
        $category = $data['category'];
        $pageTitle = $category->name . ' - ' . '#L4B';
        $posts = Post::where('category_id', '=', $category->id)->paginate(3);
        $view->with(compact('pageTitle', 'posts'));
    }

    public function edit($view)
    {
        $pageTitle = 'Edit the category' . ' - ' . '#L4B';
        $view->with(compact('pageTitle'));
    }

    public function create($view)
    {
        $pageTitle = 'Create a category' . ' - ' . '#L4B';
        $view->with(compact('pageTitle'));
    }
}
