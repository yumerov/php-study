<?php

namespace Admin;

class DashboardController extends \BaseController
{

    public function index()
    {
        return \View::make('admin.dashboard.index');
    }
}
