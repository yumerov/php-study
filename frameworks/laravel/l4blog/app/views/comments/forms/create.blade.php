<li id="new-comment" class="list-group-item clearfix">
    {{ Form::open(['route' => 'comments.store']) }}
        @include('comments.fields.name', compact('errors'))
        @include('comments.fields.body', compact('errors'))
        {{ Form::hidden('post_id', $post->id) }}
        {{ Form::submit('Comment', ['class' => 'btn btn-primary pull-right']) }}
    {{ Form::close() }}
</li>
