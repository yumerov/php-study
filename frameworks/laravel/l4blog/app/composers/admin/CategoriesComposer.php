<?php

namespace Admin;

class CategoriesComposer
{
    public function edit($view)
    {
        $page = new \stdClass;
        $page->title = 'Edit the category' . ' - ' . '#L4B';
        $view->with(compact('page'));
    }


    public function create($view)
    {
        $page = new \stdClass;
        $page->title = 'Create a category' . ' - ' . '#L4B';
        $view->with(compact('page'));
    }

    public function index($view)
    {
        $categories = \Category::orderBy('created_at', 'DESC')->paginate(3);
        $page = new \stdClass;
        $page->title = 'Category list' . ' - ' . '#L4B';
        $view->with(compact('categories', 'page'));
    }


    public function row($view)
    {

        $category = $view->getData()['category'];

        $id = $category->id;
        $name = $category->name;
        $description = $category->description;
        $hrefs = new \stdClass;
        $hrefs->view = \URL::route('categories.show', $id);
        $hrefs->edit = \URL::route('admin.categories.edit', $id);
        $deleteForm = [
            'route' => ['admin.categories.destroy', $id],
            'method' => 'delete',
            'class' => 'pull-left',
            'id' => 'delete-' . $id,
        ];

        $view->with(compact(
            'id',
            'name',
            'description',
            'hrefs',
            'deleteForm'
        ));
        
    }
}
