<?php

View::composers([
    'LayoutComposer@general' => 'layouts.default',
    'LayoutComposer@sidebar' => 'parts.sidebar',

    'PostComposer@index' => 'posts.index',
    'PostComposer@show' => 'posts.show',
    'PostComposer@create' => 'posts.create',
    'PostComposer@edit' => 'posts.edit',

    'CategoryComposer@show' => 'categories.show',
    'CategoryComposer@edit' => 'categories.edit',
    'CategoryComposer@create' => 'categories.create',
]);
