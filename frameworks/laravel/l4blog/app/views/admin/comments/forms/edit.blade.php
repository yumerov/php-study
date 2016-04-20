<li id="edit-comment" class="list-group-item clearfix">
    {{ Form::model(
        $comment,
        [
            'route' => ['admin.comments.update', $comment->id],
            'method' => 'patch',
        ]) }}
        @include('comments.fields.name', compact('errors'))
        @include('comments.fields.body', compact('errors'));
        {{ Form::hidden('post_id', $post->id) }}
        {{ Form::submit('Update', ['class' => 'btn btn-primary pull-right']) }}
    {{ Form::close() }}
</li>
