<?php

namespace Admin;

class UsersComposer
{
    public function row($view)
    {
        $user = $view->getData()['user'];

        $id = $user->id;
        $display_name = $user->display_name;
        $created_at = $user->created_at->format('H:m F j, Y');

        $hrefs = new \stdClass;
        $hrefs->view = \URL::route('users.show', $id);
        $hrefs->edit = \URL::route('admin.users.edit', $id);
        $deleteForm = [
            'route' => ['admin.users.destroy', $id],
            'method' => 'delete',
            'class' => 'pull-left',
            'id' => 'delete-' . $id,
        ];

        $view->with(compact(
            'id',
            'display_name',
            'created_at',
            'hrefs',
            'deleteForm'
        ));
    }
}
