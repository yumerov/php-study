@extends('admin.layout')

@section('page.main')
    <article class="blog-post">
        <h2 class="blog-post-title">Create a comment</h2>

        {{ Form::open(['route' => 'comments.store']) }}
            @include('comments.fields.name', compact('errors'))
            <div class="form-group">
            {{ Form::select(
                'post_id',
                $posts,
                null,
                ['class' => 'form-control']) }}
            </div>
            @include('comments.fields.body', compact('errors'))
            {{ Form::submit(
                'Comment',
                ['class' => 'btn btn-primary pull-right']) }}
        {{ Form::close() }}
    </article><!-- /.blog-post -->
@stop
