<h2 class="blog-post-title">{{ $post->title }}</h2>
<p class="blog-post-meta">
    {{ $post->created_at->format('F j, Y') }}
    @if (is_null($post->category) === false)
    <a href="{{ URL::route('categories.show', $post->category->id) }}" class="label label-primary">
        <i class="glyphicon glyphicon-folder-open"></i>
        <span>&nbsp;{{ $post->category->name }}</span>
    </a>
    @endif
</p>
