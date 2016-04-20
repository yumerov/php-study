<li id="comment-{{ $id }}" class="{{ $classes }}">
    <h4 class="list-group-item-heading">{{{ $name }}}</h4>
    <p class="list-group-item-text">{{{ $body }}}</p>

    @if (Auth::check())
    <a href="{{ $editHref }}" class="btn btn-primary btn-sm pull-left">Edit</a>
    {{ Form::open([
        'route' => ['admin.comments.destroy', $id],
        'method' => 'delete',
        'class' => 'pull-right']) }}
        {{ Form::hidden('post_id', $post_id) }}
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    {{ Form::close() }}
    @endif
</li>
