@if (!$isShow)
<a href="{{ $href }}" class="{{ $classes }}">{{ $label }}</a>
@endif

@if ($isShow)
<ul id="comments" class="list-group">
@if (is_null($commentDeleted) === false)
<li class="list-group-item list-group-item-info">
    {{ $commentDeleted }}
</li>
@endif
@foreach ($comments as $comment)
    @include('comments.parts.body', compact('comment'))
@endforeach

<?php unset($comment) # clears the last comment object from the loop ?>

@include('comments.forms.create', compact('errors'))
</ul>
@endif
