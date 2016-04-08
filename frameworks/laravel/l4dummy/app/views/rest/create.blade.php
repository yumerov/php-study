@extends('layouts.default')

@section('title')
  Create a new users
@stop

@section('body')
  <h1>Create a new users</h1>

  {{ Form::open(['route' => 'users.store']) }}

    <div>
      {{ Form::label('username', 'Username: ') }}
      {{ Form::text('username') }}
      {{ $errors->first('username') }}
    </div>

    <div>
      {{ Form::label('email', 'Email: ') }}
      {{ Form::text('email') }}
      {{ $errors->first('email') }}
    </div>

    <div>
      {{ Form::label('password', 'Password: ') }}
      {{ Form::password('password') }}
      {{ $errors->first('password') }}
    </div>

    <div>
      {{ Form::submit('Create user') }}
    </div>

  {{ Form::close() }}

  {{ link_to('/users', 'Bakc to list') }}
@stop