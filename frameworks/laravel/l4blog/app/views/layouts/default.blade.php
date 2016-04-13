<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $pageTitle }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/blog.css">

  <link rel="icon" type="image/png" href="favicon.ico">
</head>
<body>
  @if (!empty($nav))
  <div class="blog-masthead">
    <div class="container">
      <nav class="blog-nav">
        @foreach ($nav as $item)
        <a class="blog-nav-item" href="{{ $item['link'] }}">
          {{ $item['title'] }}
        </a>
        @endforeach
      </nav><!-- /.blog-nav -->
    </div><!-- /.container -->
  </div><!-- /.blog-masthead -->
  @endif

  <div class="container">
    <div class="blog-header">
      <h1 class="blog-title">{{ $blogTitle }}</h1>
      <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>

    <div class="row">
      
      <div class="col-sm-8 blog-main">
        @yield('page.main')
      </div><!-- /.blog-main -->

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          <h4>About</h4>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>

        <div class="sidebar-module">
          <h4>Archives</h4>
          <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
          </ol>
        </div>

        <div class="sidebar-module">
          <h4>Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
  </div><!-- /.container -->

  <footer class="blog-footer">
    <p>Basic blog platform build with Laravel 4 and Bootstrap 3.</p>
  </footer>

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>