<h2 class="blog-post-title">{{ $post->title }}</h2>
<p class="blog-post-meta">
    <span class="label label-success">
        <i class="glyphicon glyphicon-calendar"></i>&nbsp;
        <span>{{ $post->created_at->format('F j, Y') }}</span>
    </span>&nbsp;
    @if (is_null($post->category) === false)
    <a href="{{ URL::route('categories.show', $post->category->id) }}" class="label label-primary">
        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
        <span>{{ $post->category->name }}</span>
    </a>
    @endif
</p>
