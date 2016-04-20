@extends('frontend.layout')

@section('page.main')
    <div class="sidebar-module sidebar-module-inset">
      <h1>{{ $display_name }}</h1>
    </div><!-- /.sidebar-module.sidebar-module-inset -->
    @foreach($posts as $post)
    <article class="blog-post">
        @include('posts.view', compact('post'))
    </article><!-- /.blog-post -->
    @endforeach

    {{ $posts->links() }}
@stop
