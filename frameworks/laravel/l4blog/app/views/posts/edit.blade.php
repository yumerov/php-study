@extends('layouts.default')

@section('page.main')
	<article class="blog-post">
	  <h2 class="blog-post-title">Edit the post</h2>

	  @if (Session::has('success'))
	  <div class="alert alert-success" role="alert">
	  	{{ Session::get('success') }}
	  </div>
	  @endif

	  {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch']) }}
	    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	      {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
	      @if ($errors->has('title'))
	      <span class="help-block">{{ $errors->first('title') }}</span>
	      @endif
	    </div><!-- /.form-group -->

	    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	      {{ Form::textarea('body', $post->body, [
	      	'class' => 'form-control', 'placeholder' => 'Body'
	      ]) }}
	      @if ($errors->has('title'))
	      <span class="help-block">{{ $errors->first('body') }}</span>
	      @endif
	    </div><!-- /.form-group -->

	    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) }}
      <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
	</article><!-- /.blog-post -->

@stop
