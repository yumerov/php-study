@extends('layouts.default')

@section('page.main')
    <article class="blog-post">
        <h2 class="blog-post-title">Create a category</h2>

        {{ Form::open(['route' => 'categories.store']) }}
            @include(
                'categories.parts.fields',
                compact('category', 'errors'))
        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
    </article><!-- /.blog-post -->
@stop
