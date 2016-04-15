<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

    {{ Form::select(
        'category_id',
        $category_selects,
        isset($post->category_id) ? $post->category_id : null,
        ['class' => 'form-control']) }}

    @if ($errors->has('category_id'))
    <span class="help-block">{{ $errors->first('category_id') }}</span>
    @endif
</div><!-- /.form-group -->
