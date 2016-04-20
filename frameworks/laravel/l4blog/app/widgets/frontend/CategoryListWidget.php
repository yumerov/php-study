<?php

namespace Frontend;

class CategoryListWidget implements \WidgetInterface
{
    public function data()
    {
        return \Category::all();
    }

    public function render($data = [])
    {
        $categories = $this->data();
        return \View::make('frontend.category_list')
            ->with(compact('categories'))
            ->render();
    }
}
