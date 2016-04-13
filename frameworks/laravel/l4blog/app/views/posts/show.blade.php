@extends('layouts.default')

@section('page.main')
	<article class="blog-post">
	  <h2 class="blog-post-title">{{ $post->title }}</h2>
	  <p class="blog-post-meta">{{ $post->created_at->format('F j, Y') }}</p>
	  {{-- <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> --}}
		<p>{{ nl2br($post->body) }}</p>

		<a href="{{ URL::route('posts.edit', ['posts' => $post->id]) }}" class="btn btn-sm btn-primary pull-right">Edit</a>
	</article><!-- /.blog-post -->

@stop