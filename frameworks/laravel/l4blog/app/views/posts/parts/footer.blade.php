@if (!$isShow)
<a href="{{ $href }}" class="{{ $classes }}">{{ $label }}</a>
@endif

@if ($isShow)
<ul id="comments" class="list-group">
    <li class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat officiis officia nisi doloribus quos molestiae optio veniam nobis necessitatibus esse, sit ut dolor suscipit, voluptatibus qui blanditiis nam totam. Dolorem!</p>
    </li>
    <li class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum eum expedita molestiae praesentium labore quod ut vel sint ducimus, veniam doloribus aliquam aspernatur in libero soluta maxime reiciendis quisquam minima!</p>
    </li>
    <li class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et suscipit unde veniam provident ipsam! Tempore ipsum totam deserunt aut itaque, quam magni dicta labore! Adipisci nostrum debitis eos aspernatur itaque!</p>
    </li>
    <li class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab modi quo nulla? Fuga repudiandae dignissimos voluptas a aliquid, rerum officia autem deleniti. Nesciunt iste sed, facere error ducimus. Optio, nihil!</p>
    </li>
    <li class="list-group-item">
        <h4 class="list-group-item-heading">List group item heading</h4>
        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti aspernatur laboriosam ullam nemo consequuntur at, nihil quae voluptatem illo sapiente, earum quibusdam quo perspiciatis sunt voluptas iusto recusandae, qui obcaecati.</p>
    </li>
</ul>
@endif
