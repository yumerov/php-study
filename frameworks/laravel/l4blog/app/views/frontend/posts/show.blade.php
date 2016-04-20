@extends('frontend.layout')

@section('page.main')
    <article class="blog-post">
        @include('posts.view', compact('post'))
    </article><!-- /.blog-post -->
@stop
