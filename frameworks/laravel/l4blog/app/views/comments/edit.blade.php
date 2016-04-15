@extends('layouts.default')

@section('page.main')
    <article class="blog-post">
        @include('posts.parts.header', compact('post'))
        @include('posts.parts.body', compact('post'))
    </article><!-- /.blog-post -->

    <ul id="comments" class="list-group">
        @include('comments.forms.edit', compact('errors'))
    </ul>
@stop
