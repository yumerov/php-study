@extends('admin.layout')

@section('page.main')
    <article class="blog-post">
        <h2 class="blog-post-title">Edit the post</h2>

        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif

        {{ Form::model($post, [
            'route' => ['admin.posts.update', $post->id],
            'method' => 'patch',
            'files' => true,]) }}
            @include('posts.parts.fields', compact('post', 'errors'))
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}

    {{ Form::open([
        'route' => ['admin.posts.destroy', $post->id],
        'method' => 'delete']) }}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
    </article><!-- /.blog-post -->

@stop
