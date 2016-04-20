@extends('layouts.master')

@section('main')
<div class="col-sm-8 blog-main">
  @yield('page.main')
</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  @include('parts.sidebar')
</div><!-- /.blog-sidebar -->
@stop