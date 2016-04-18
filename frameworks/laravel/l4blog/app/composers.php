<?php

View::composers([
    'LayoutComposer@general' => 'layouts.default',
    'LayoutComposer@nav' => 'parts.nav',
    'LayoutComposer@sidebar' => 'parts.sidebar',

    'PostComposer@index' => 'posts.index',
    'PostComposer@show' => 'posts.show',
    'PostComposer@create' => 'posts.create',
    'PostComposer@edit' => 'posts.edit',

    'PostComposer@category_field' => 'posts.parts.fields.category',
    'PostPartsComposer@header' => 'posts.parts.header',
    'PostPartsComposer@body' => 'posts.parts.body',
    'PostPartsComposer@footer' => 'posts.parts.footer',

    'CategoryComposer@show' => 'categories.show',
    'CategoryComposer@edit' => 'categories.edit',
    'CategoryComposer@create' => 'categories.create',

    'CommentComposer@body' => 'comments.parts.body',
    'CommentComposer@edit' => 'comments.edit',

    'UserComposer@login' => 'users.login',
]);
