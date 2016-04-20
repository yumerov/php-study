<?php

namespace Frontend;

class UsersComposer
{

    public function show($view)
    {
        $data = $view->getData();
        $user = $data['user'];
        $page = new \stdClass;

        $id = $user->id;
        $display_name = $user->display_name;
        $page->title = $display_name . '\'s posts - ' . '#L4B';

        $view->with(compact('page', 'id', 'display_name'));
    }
}
