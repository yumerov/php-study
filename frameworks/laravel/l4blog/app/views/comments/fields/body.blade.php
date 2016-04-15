<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {{ Form::textarea(
        'body',
        isset($comment->body) ? $comment->body : null,
        [
            'class' => 'form-control',
            'placeholder' => 'Body',
        ]) }}
    @if ($errors->has('body'))
    <span class="help-block">{{ $errors->first('body') }}</span>
    @endif
</div><!-- /.form-group -->
