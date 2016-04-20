@include('parts.nav')

<div class="container">
    @include('parts.header')

    <div class="row">
        @yield('main')
    </div><!-- /.row -->
</div><!-- /.container -->

<footer class="blog-footer">
<p>{{ $blog->footer }}</p>
</footer>

{{ HTML::script('/js/jquery.min.js') }}
{{ HTML::script('/js/bootstrap.min.js') }}