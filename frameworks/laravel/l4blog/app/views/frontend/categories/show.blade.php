@extends('frontend.layout')

@section('page.main')
    <div class="sidebar-module sidebar-module-inset">
      <h1>{{ $name }}</h1>
      <p>{{ $description }}</p>
      <a href="{{ URL::route('admin.categories.edit', $id) }}" class="label label-primary">Edit</a>
    </div><!-- /.sidebar-module.sidebar-module-inset -->
    @foreach($posts as $post)
    <article class="blog-post">
        @include('posts.view', compact('post'))
    </article><!-- /.blog-post -->
    @endforeach

    {{ $posts->links() }}
@stop
