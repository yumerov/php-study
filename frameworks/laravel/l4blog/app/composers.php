<?php

View::composers([
    'LayoutComposer@general' => 'layouts.default',
    'LayoutComposer@sidebar' => 'parts.sidebar',

    'PostComposer@index' => 'posts.index',
    'PostComposer@show' => 'posts.show',
    'PostComposer@create' => 'posts.create',
    'PostComposer@edit' => 'posts.edit',
    'PostComposer@category_field' => 'parts.posts.fields.category',

    'CategoryComposer@show' => 'categories.show',
    'CategoryComposer@edit' => 'categories.edit',
    'CategoryComposer@create' => 'categories.create',
]);
