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
  @include('parts.nav')

  <div class="container">
    <div class="blog-header">
      <h1 class="blog-title">{{ $blogTitle }}</h1>
      <p class="lead blog-description">Dummy blog cms based on Laravel 4.</p>
    </div>

    <div class="row">

      <div class="col-sm-8 blog-main">
        @yield('page.main')
      </div><!-- /.blog-main -->

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        @include('parts.sidebar')
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
