@extends('frontend.layout')

@section('page.main')
    @if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

@foreach($posts as $post)
    <article class="blog-post">
        @include('posts.view', compact('post'))
    </article><!-- /.blog-post -->
@endforeach

{{ $posts->links() }}
@stop
