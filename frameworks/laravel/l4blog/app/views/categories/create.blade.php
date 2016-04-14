@extends('layouts.default')

@section('page.main')
    <article class="blog-post">
      <h2 class="blog-post-title">Create a category</h2>

      {{ Form::open(['route' => 'categories.store']) }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
          @if ($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
          @endif
        </div><!-- /.form-group -->

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
          {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
          @if ($errors->has('description'))
          <span class="help-block">{{ $errors->first('description') }}</span>
          @endif
        </div><!-- /.form-group -->

        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
    </article><!-- /.blog-post -->

@stop
