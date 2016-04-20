@extends('admin.layout')

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
            <th>Post</th>
            <th>Name</th>
            <th>Creaetd at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <hbody>  
    @foreach($comments as $comment)
        @include('comments.parts.row', compact('comment'))
    @endforeach
    </hbody>
</table>

{{ $comments->links() }}
@stop
