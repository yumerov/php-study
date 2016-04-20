@extends('admin.layout')

@section('page.main')
    @if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        {{ Session::get('message')}}
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
        @include('posts.parts.row', compact('post'))
    @endforeach
    </hbody>
</table>

{{ $posts->links() }}
@stop
