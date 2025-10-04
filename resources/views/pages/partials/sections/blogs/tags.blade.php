@if (count($tags) > 0)

<div class="widget__tags " >
    <h2 class="widget__title-2">TAGS</h2>
    <ul>
        @foreach ($tags as $tag)
        <li><a href="{{ route('blogs.tags', [$tag->slug]) }}">{{ $tag->label }}</a></li>
        @endforeach
    </ul>
</div>
@endif
