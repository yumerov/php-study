{{ Form::open([
    'route' => 'auth',
    'class' => 'form-horizontal']) }}
    @if (Session::has('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        {{ Form::label(
            'username',
            'Username',
            ['class' =>'col-sm-4 control-label']) }}
        <div class="col-sm-8">
        {{ Form::text(
            'username',
            Input::old('username', null),
            ['class' => 'form-controller', 'placeholder' => 'Username']) }} 
        </div>
    </div><!-- .form-group -->

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {{ Form::label(
            'password',
            'Password',
            ['class' =>'col-sm-4 control-label']) }}
        <div class="col-sm-8">
            {{ Form::password(
                'password',
                null,
                ['class' => 'form-controller']) }}
        </div>
    </div><!-- .form-group -->

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
{{ Form::close() }}