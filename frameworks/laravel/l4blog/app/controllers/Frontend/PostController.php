<?php

namespace Frontend;

class PostsController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \View::make('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = \Post::findOrFail($id);
        return \View::make('posts.show', compact('post'));
    }
}
