<?php

class UserComposer
{
    public function login($view)
    {
        $pageTitle = 'Login' . ' - '. '#L4B';
        $view->with(compact('pageTitle'));
    }
}
