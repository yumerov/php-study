@extends('layouts.default')

@section('page.main')
    <article class="blog-post">
        @include('posts.parts.header', compact('post'))
        @include('posts.parts.body', compact('post'))
        @include('posts.parts.footer', compact('post'))
    </article><!-- /.blog-post -->
@stop
