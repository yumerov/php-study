@extends('layouts.default')

@section('title')
  All users
@stop

@section('body')
  <h1>All users</h1>

  <ul>
  @if (!$users->isEmpty())
    @foreach ( $users as $user )
      <li>{{ link_to("/users/{$user->id}", $user->username) }}</li>
    @endforeach
  @else
    <strong>no users</strong>
  @endif
  </ul>
@stop