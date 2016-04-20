<?php

namespace Frontend;

class CategoriesController extends \BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = \Category::findOrFail($id);
        return \View::make('categories.show', compact('category'));
    }
}
