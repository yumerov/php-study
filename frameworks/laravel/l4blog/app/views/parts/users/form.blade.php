@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
    </div>
@endif

{{ Form::open(['route' => 'users.store']) }}
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    {{ Form::text(
        'username',
        isset($user->username) ? $user->username : null,
        ['class' => 'form-control', 'placeholder' => 'Username']) }}
    @if ($errors->has('username'))
    <span class="help-block">{{ $errors->first('username') }}</span>
    @endif
</div><!-- /.form-group -->

<div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
    {{ Form::text(
        'display_name',
        isset($user->display_name) ? $user->display_name : null,
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

{{ Form::hidden('redirect', Request::path()) }}

{{ Form::submit('Register', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}