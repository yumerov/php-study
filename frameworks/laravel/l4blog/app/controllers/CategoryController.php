<?php

class CategoryController extends \BaseController
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $validator = Validator::make($data, Category::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('categories.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = Category::create($data);
            $response = Redirect::route('categories.show', $category->id);
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
        $category = Category::findOrFail($id);
        return View::make('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return View::make('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        $category = Category::findOrFail($id);

        $data = Input::all();
        $validator = Validator::make($data, Category::$rules);

        if ($validator->fails()) {
            $response = Redirect::route('categories.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = $category->update($data);
            $response = Redirect::route('categories.edit', $id)
                ->with('success', 'The category is updated successfully.');
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
        $categories = Category::findOrFail($id);
        Category::destroy($id);
        return Redirect::route('posts.index')->with(
            'message', "Category with id {$id} is deleted successfully.");
    }

}
