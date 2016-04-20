<?php

namespace Frontend;

class CategoriesComposer
{

    public function show($view)
    {
        $data = $view->getData();
        $category = $data['category'];
        $page = new \stdClass;

        $id = $category->id;
        $name = $category->name;
        $description = $category->description;

        $page->title = $name . ' - ' . '#L4B';
        $posts = \Post::where('category_id', '=', $id)->paginate(3);

        $view->with(compact(
            'page',
            'posts',
            'id',
            'name',
            'description'
        ));
    }
}
