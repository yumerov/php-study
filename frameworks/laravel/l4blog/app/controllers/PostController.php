<?php

class PostController extends \BaseController
{
    protected function storeImage($image)
    {
        $destination = 'uploads';
        $name = uniqid(rand(), true) . '.' . $image->getClientOriginalExtension();
        $image->move("public/{$destination}", $name);

        return "/{$destination}/{$name}";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $validator = Validator::make($data, Post::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('posts.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Input::hasFile('image')) {
                $data['image'] = $this->storeImage(Input::file('image'));
            }
            $post = Post::create($data);
            $response = Redirect::route('posts.show', ['posts' => $post->id]);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return View::make('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return View::make('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $post = Post::findOrFail($id);

        $data = Input::all();
        $validator = Validator::make($data, Post::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('posts.edit', compact('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Input::hasFile('image')) {
                $data['image'] = $this->storeImage(Input::file('image'));
                if (is_null($post->image) === false) {
                    File::delete(public_path() . $post->image);
                }
            } else {
                unset($data['image']);
            }
            $post = $post->update($data);
            $response = Redirect::route('posts.edit', ['posts' => $id])
                ->with('success', 'The post is updated successfully.');
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Post::destroy($id);
        return Redirect::route('posts.index')->with(
            'message', "Post with id {$id} is deleted successfully.");
    }

}
