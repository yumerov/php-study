@extends('layouts.default')

@section('page.main')
	<article class="blog-post">
		<h2 class="blog-post-title">Create a post</h2>

		{{ Form::open(['route' => 'posts.store', 'files' => true]) }}
	  		@include('posts.parts.fields', compact('post', 'errors'))
		    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
	    {{ Form::close() }}
	</article><!-- /.blog-post -->
@stop
