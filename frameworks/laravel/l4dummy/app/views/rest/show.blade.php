@extends('layouts.default')

@section('title')
  {{ $user->username }}
@stop

@section('body')
  <h1>{{ $user->username }}</h1>

  <ul>
    <li><strong>id:</strong> {{ $user->id }}</li>
    <li><strong>username:</strong> {{ $user->username }}</li>
    <li><strong>email:</strong> {{ $user->email }}</li>
    <li><strong>password:</strong> {{ $user->password }}</li>
  </ul>
@stop