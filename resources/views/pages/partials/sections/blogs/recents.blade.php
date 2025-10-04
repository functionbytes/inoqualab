 @if (count($recents) > 0)

 
 <div class="widget__recent-posts " >
    <h2 class="widget__title-2">RECIENTES</h2>
    <div class="widget__rposts">
        @foreach ($recents as $recent)
        <div class="widget__rpost">
            <a href="{{ route('blogs.view', $recent->slug) }}">
                <article>
                    <div class="rp-right">
                        <h3 class="rp-title">{{ substr(strip_tags($recent->label), 0, 400) }}</h3>
                        <p class="rp-date">{{ humanize_date($recent->created_at) }}</p>
                    </div>
                </article>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endif