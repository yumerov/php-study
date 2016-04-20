@extends('dashboard.layout')

@section('page.main')
    @if (Session::has('message'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('message')}}
        </div>
    @endif
    
    <div class="col-sm-6">
        {{ widget('admin', 'recent_created_posts') }}
        {{ widget('admin', 'recent_created_posts') }}
    </div>

    <div class="col-sm-6">
        {{ widget('admin', 'recent_updated_posts') }}
        {{ widget('admin', 'recent_updated_posts') }}
        {{ widget('admin', 'recent_updated_posts') }}
        
    </div>
@stop
