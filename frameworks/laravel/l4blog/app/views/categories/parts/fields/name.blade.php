<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::text(
        'name',
        isset($category->name) ? $category->name : null,
        ['class' => 'form-control', 'placeholder' => 'Name']) }}
    @if ($errors->has('name'))
    <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div><!-- /.form-group -->
