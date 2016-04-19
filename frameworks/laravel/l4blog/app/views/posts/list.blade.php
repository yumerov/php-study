@extends('layouts.default')

@section('page.main')
    @if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Creaetd at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <hbody>  
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->format('H:m F j, Y') }}</td>
            <td>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                {{ Form::open([
                    'route' => ['posts.destroy', $post->id],
                    'method' => 'delete']) }}
                    <button type="submit">Delete</button>
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </hbody>
</table>

{{ $posts->links() }}
@stop
