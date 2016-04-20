<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::textarea(
        'description',
        isset($category->description) ? $category->description : null,
        ['class' => 'form-control', 'placeholder' => 'Description']) }}
    @if ($errors->has('description'))
    <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div><!-- /.form-group -->
