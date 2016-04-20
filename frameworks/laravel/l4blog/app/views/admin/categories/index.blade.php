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
            <th>Нame</th>
            <th>Actions</th>
        </tr>
    </thead>
    <hbody>  
    @foreach($categories as $category)
        @include('categories.parts.row', compact('category'))
    @endforeach
    </hbody>
</table>

{{ $categories->links() }}
@stop
