@extends('layouts.default')

@section('page.main')
    <article class="blog-post">
      <h2 class="blog-post-title">Edit the category</h2>

      @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif

      {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
          @if ($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
          @endif
        </div><!-- /.form-group -->

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
          {{ Form::textarea('description', $category->description, [
            'class' => 'form-control', 'placeholder' => 'Description'
          ]) }}
          @if ($errors->has('description'))
          <span class="help-block">{{ $errors->first('description') }}</span>
          @endif
        </div><!-- /.form-group -->

        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) }}
      <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
    </article><!-- /.blog-post -->

@stop
