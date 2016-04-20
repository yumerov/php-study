<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::text(
        'title',
        isset($post->title) ? $post->title : null,
        ['class' => 'form-control', 'placeholder' => 'Title']) }}
    @if ($errors->has('title'))
    <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div><!-- /.form-group -->
