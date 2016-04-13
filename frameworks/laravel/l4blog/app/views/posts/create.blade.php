@extends('layouts.default')

@section('page.main')
	<article class="blog-post">
	  <h2 class="blog-post-title">Create a post</h2>

	  {{ Form::open(['route' => 'posts.store']) }}
	    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	      {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
	      @if ($errors->has('title'))
	      <span class="help-block">{{ $errors->first('title') }}</span>
	      @endif
	    </div><!-- /.form-group -->

	    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	      {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Body']) }}
	      @if ($errors->has('title'))
	      <span class="help-block">{{ $errors->first('body') }}</span>
	      @endif
	    </div><!-- /.form-group -->

	    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
	</article><!-- /.blog-post -->

@stop