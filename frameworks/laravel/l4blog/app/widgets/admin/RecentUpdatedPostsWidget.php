<?php

namespace Admin;

class RecentUpdatedPostsWidget implements \WidgetInterface
{
    public function data()
    {
        return \Post::orderBy('updated_at', 'DESC')->paginate(3);
    }

    public function render($data = [])
    {
        $cols = (isset($data['cols']) ? $data['cols'] : 6);
        $posts = $this->data();
        return \View::make('admin.recent_updated_posts')
            ->with(compact('posts', 'cols'))
            ->render();
    }
}
