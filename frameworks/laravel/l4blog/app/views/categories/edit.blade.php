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
        @include('categories.parts.fields', compact('category', 'errors'))
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) }}
      <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
    </article><!-- /.blog-post -->

@stop
