@extends('admin.layout')

@section('page.main')
    <article class="blog-post">
        <h2 class="blog-post-title">Edit the the profile</h2>

        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif

        {{ Form::model($user, [
            'route' => ['admin.users.update', $user->id],
            'method' => 'patch',]) }}
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                {{ Form::text(
                    'username',
                    $user->username,
                    ['class' => 'form-control', 'placeholder' => 'Username']) }}
                @if ($errors->has('username'))
                <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div><!-- /.form-group -->

            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                {{ Form::text(
                    'display_name',
                    $user->display_name,
                    ['class' => 'form-control', 'placeholder' => 'Display name']) }}
                @if ($errors->has('display_name'))
                <span class="help-block">{{ $errors->first('display_name') }}</span>
                @endif
            </div><!-- /.form-group -->

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{ Form::password(
                    'password',
                    ['class' => 'form-control', 'placeholder' => 'Password']) }}
                @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div><!-- /.form-group -->
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
    </article><!-- /.blog-post -->

@stop
