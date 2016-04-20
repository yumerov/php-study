<?php

# common

View::composers([
    'LayoutComposer@general' => 'layouts.master',
    'LayoutComposer@nav' => 'parts.nav',
    'LayoutComposer@sidebar' => 'parts.sidebar',

    'CommentComposer@body' => 'comments.parts.body',
    'CommentComposer@edit' => 'comments.edit',

    'UserComposer@login' => 'users.login',
]);

# admin

View::composers([
    'Admin\PostsComposer@row' => 'posts.parts.row',
    'Admin\PostsComposer@index' => 'admin.posts.index',
    'Admin\PostsComposer@edit' => 'posts.edit',
    'Admin\PostsComposer@create' => 'posts.create',
    'Admin\PostsComposer@categoryField' => 'posts.parts.fields.category',

    'Admin\CategoriesComposer@index' => 'admin.categories.index',
    'Admin\CategoriesComposer@edit' => 'admin.categories.edit',
    'Admin\CategoriesComposer@create' => 'admin.categories.create',
    'Admin\CategoriesComposer@row' => 'categories.parts.row',

    'Admin\CommentsComposer@row' => 'comments.parts.row',
]);

# frontend

View::composers([
    'Frontend\PostsComposer@index' => 'posts.index',
    'Frontend\PostsComposer@show' => 'posts.show',
    'Frontend\PostsComposer@header' => 'posts.parts.header',
    'Frontend\PostsComposer@body' => 'posts.parts.body',
    'Frontend\PostsComposer@footer' => 'posts.parts.footer',

    'Frontend\CategoriesComposer@show' => 'categories.show',
]);
