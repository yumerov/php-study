<div class="sidebar-module sidebar-module-inset">
  <h4>About</h4>
  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>

@if (isset($categories))
<div class="sidebar-module">
  <h4>Categories</h4>
  <ol class="list-unstyled">
    @foreach ($categories as $category)
    <li><a href="{{ URL::route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
    @endforeach
  </ol>
</div>
@endif
