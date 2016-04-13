@extends('layouts.default')

@section('page.main')
  @if (Session::has('message'))
  <div class="alert alert-info" role="alert">
  	{{ Session::get('message') }}
  </div>
  @endif

	@foreach($posts as $post)
	<article class="blog-post">
	  <h2 class="blog-post-title">{{ $post->title }}</h2>
	  <p class="blog-post-meta">{{ $post->created_at->format('F j, Y') }}</p>
	  {{-- <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p> --}}
		<p>{{ nl2br($post->body) }}</p>
		<a href="{{ URL::route('posts.show', ['posts' => $post->id]) }}" class="btn btn-sm btn-primary pull-right">Read more</a>
	</article><!-- /.blog-post -->
	@endforeach

	{{ $posts->links() }}
@stop