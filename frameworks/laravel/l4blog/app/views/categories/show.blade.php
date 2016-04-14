@extends('layouts.default')

@section('page.main')
    <div class="sidebar-module sidebar-module-inset">
      <h1>{{ $category->name }}</h1>
      <p>{{ $category->description }}</p>
      <a href="{{ URL::route('categories.edit', $category->id) }}" class="label label-primary">Edit</a>
    </div><!-- /.sidebar-module.sidebar-module-inset -->
    @foreach($posts as $post)
    <article class="blog-post">
        @include('parts.posts.header', compact('post'))
        @include('parts.posts.body', compact('post'))
        @include('parts.posts.footer', compact('post'))
    </article><!-- /.blog-post -->
    @endforeach

    {{ $posts->links() }}
@stop