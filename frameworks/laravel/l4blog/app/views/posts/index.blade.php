@extends('layouts.default')

@section('page.main')
    @if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

@foreach($posts as $post)
    <article class="blog-post">
        @include('parts.posts.header', compact('post'))
        @include('parts.posts.body', compact('post'))
        @include('parts.posts.footer', compact('post'))
    </article><!-- /.blog-post -->
@endforeach

{{ $posts->links() }}
@stop
