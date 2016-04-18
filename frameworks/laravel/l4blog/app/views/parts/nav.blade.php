@if (!empty($nav))
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav pull-left">
      @foreach ($nav['left'] as $item)
      <a class="blog-nav-item" href="{{ $item['link'] }}">
        {{ $item['title'] }}
      </a>
      @endforeach
    </nav><!-- /.blog-nav -->

    <nav class="blog-nav pull-right">
      @foreach ($nav['right'] as $item)
      <a class="blog-nav-item" href="{{ $item['link'] }}">
        {{ $item['title'] }}
      </a>
      @endforeach
    </nav><!-- /.blog-nav -->
  </div><!-- /.container -->
</div><!-- /.blog-masthead -->
@endif
