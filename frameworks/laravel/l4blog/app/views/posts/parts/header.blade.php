<h2 class="blog-post-title">{{ $title }}</h2>
<p class="blog-post-meta">
    <span class="label label-success">
        <i class="glyphicon glyphicon-calendar"></i>&nbsp;
        <span>{{ $date }}</span>
    </span>&nbsp;

    @if ($hasAuthor)
    <a href="{{ $authorHref }}" class="label label-danger">
        <i class="glyphicon glyphicon-user"></i>&nbsp;
        <span>{{ $authorName }}</span>
    </a>&nbsp;
    @endif

    @if ($hasCategory)
    <a href="{{ $categoryHref }}" class="label label-primary">
        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
        <span>{{ $categoryName }}</span>
    </a>&nbsp;
    @endif

    <a href="{{ $commentsHref }}" class="label label-info">
        <i class="glyphicon glyphicon-comment"></i>&nbsp;
        <span>{{ $commentsLabel }}</span>&nbsp;
    </a>
</p>
