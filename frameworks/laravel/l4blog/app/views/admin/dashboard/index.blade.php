@extends('dashboard.layout')

@section('page.main')
    @if (Session::has('message'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('message')}}
        </div>
    @endif

    {{ widget('admin', 'recent_created_posts', ['cols' => 6]) }}
    {{ widget('admin', 'recent_updated_posts', ['cols' => 6]) }}
@stop
