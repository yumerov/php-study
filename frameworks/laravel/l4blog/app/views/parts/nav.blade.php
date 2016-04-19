@if (!empty($nav))
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav pull-left">
      @foreach ($nav['left'] as $item)
        @if (isset($item['childs']))
          <span class="dropdown">
            <a href="{{ $item['link'] }}" class="blog-nav-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              {{ $item['title'] }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
            @foreach ($item['childs'] as $child)
              <li><a href="{{ $child['link'] }}">{{ $child['title'] }}</a></li>
            @endforeach
            </ul>
          </span>
        @else
          <span><a class="blog-nav-item" href="{{ $item['link'] }}">
            {{ $item['title'] }}
          </a></span>
        @endif
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
