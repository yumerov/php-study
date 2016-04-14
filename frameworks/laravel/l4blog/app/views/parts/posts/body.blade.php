@if (isset($post->image))
<img src="{{ $post->image }}" alt="" class="img-responsive">
@endif

<p>{{ nl2br($post->body) }}</p>
