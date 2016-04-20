<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    @if (isset($post->image))
    <img src="{{ $post->image }}" alt="" class="img-responsive">
    @endif
    {{ Form::file('image') }}
    @if ($errors->has('image'))
    <span class="help-block">{{ $errors->first('image') }}</span>
    @endif
</div><!-- /.form-group -->
