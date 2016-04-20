@extends('admin.layout')

@section('page.main')
    <article class="blog-post">
        <h2 class="blog-post-title">Create a user</h2>

        @include('users.form')
    </article><!-- /.blog-post -->
@stop
