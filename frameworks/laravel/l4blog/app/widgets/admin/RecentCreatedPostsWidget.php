<?php

namespace Admin;

class RecentCreatedPostsWidget implements \WidgetInterface
{
    public function data()
    {
        return \Post::orderBy('created_at', 'DESC')->paginate(3);
    }

    public function render($data = [])
    {
        $cols = (isset($data['cols']) ? $data['cols'] : 6);
        $posts = $this->data();
        return \View::make('admin.recent_created_posts')
            ->with(compact('posts', 'cols'))
            ->render();
    }
}
