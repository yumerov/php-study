@extends('layouts.default')

@section('page.main')
	<article class="blog-post">
        @include('parts.posts.header', compact('post'))
        @include('parts.posts.body', compact('post'))
	</article><!-- /.blog-post -->

@stop
