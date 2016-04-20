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
                <th>Display name</th>
                <th>Creaetd at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <hbody>  
        @foreach($users as $user)
            @include('users.parts.row', compact('user'))
        @endforeach
        </hbody>
    </table>

    {{ $users->links() }}
@stop
