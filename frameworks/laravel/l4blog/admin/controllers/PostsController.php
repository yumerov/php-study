<?php

namespace Admin\Controllers;

use Illuminate\Support\Facades\View;

class PostsController extends \BaseController
{
    public function index()
    {
        return View::make('hello');
    }
}
