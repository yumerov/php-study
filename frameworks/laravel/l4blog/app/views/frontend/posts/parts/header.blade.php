<h2 class="blog-post-title">{{ $title }}</h2>
<p class="blog-post-meta">
    <span class="label label-success">
        <i class="glyphicon glyphicon-calendar"></i>&nbsp;
        <span>{{ $date }}</span>
    </span>&nbsp;

    @if ($author->has)
    <a href="{{ $author->href }}" class="label label-danger">
        <i class="glyphicon glyphicon-user"></i>&nbsp;
        <span>{{ $author->name }}</span>
    </a>&nbsp;
    @endif

    @if ($category->has)
    <a href="{{ $category->href }}" class="label label-primary">
        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
        <span>{{ $category->name }}</span>
    </a>&nbsp;
    @endif

    <a href="{{ $comments->href }}" class="label label-info">
        <i class="glyphicon glyphicon-comment"></i>&nbsp;
        <span>{{ $comments->label }}</span>&nbsp;
    </a>
</p>
