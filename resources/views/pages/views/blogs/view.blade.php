@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')

<main>

    <section class="blog__detail wow wcfadeUp" data-wow-delay="0.15s" >
        <div class="container line">

            <div class="row g-0">
                <div class="col-xxl-12">
                    <h2 class="blog__detail-title ">{{ ucwords($blog->label) }}</h2>
                </div>

                <div class="col-xxl-12">
                    <div class="blog__detail-meta " >
                        <ul>
                            <li><span>Escrito por</span> <a >Inoqualab</a></li>
                            <li><span>Categoria</span> <a href="{{ route('blogs.categories', $blog->categorie->slug) }}">{{ $blog->categorie->label }}</a></li>
                            <li><span>Fecha</span> {{ humanize_date($blog->created_at) }}</li>
                            <li><span>vISTAS</span> 5,87,425</li>
                        </ul>
                    </div>
                    @if ($blog->thumbnail() != null)
                        <img class="blog__detail-thumb " src="/pages/imgs/blogs/{{ $blog->thumbnail()->filename }}" alt="{{ $blog->slug }}">
                    @else
                        <img class="blog__detail-thumb" src="/pages/imgs/blogs/default.jpg" alt="{{ $blog->slug }}">
                    @endif
                </div>


                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-8">
                    <div class="blog__detail-content " >
                        <p>{!! $blog->content !!}</p>
                        
                        @if ($blog->sentence != null)
                        <div class="quote">
                            <p>“{{ $blog->sentence }}”</p>
                        </div>
                        @endif


                    <div class="blog__detail-btm">
                        
                        @if (count($blog->tags) > 0)
                        <ul class="blog__detail-tags">
                              <li>Tags :</li>
                              @foreach ( $tags as $tag)
                              <li><a href="{{ route('blogs.tags', $tag->slug) }}">{{ $tag->label }}</a></li>
                              @endforeach
                          </ul>
                        @endif
                        <ul class="blog__detail-share">
                            <li>Compartir :</li>
                            <li><a ><span><i class="fa-brands fa-facebook-f"></i></span></a></li>
                        </ul>
                    </div>


                  </div>
                </div>

                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                     
                       
                        @include ('pages.partials.sections.blogs.search')

                        @include ('pages.partials.sections.blogs.categories')

                        @include ('pages.partials.sections.blogs.recents')

                        @include ('pages.partials.sections.blogs.tags')

                        <div class="widget__thumb wow wcfadeUp" data-wow-delay="0.45s" style="visibility: visible; animation-delay: 0.45s; animation-name: wcfadeUp;">
                            <img src="assets/imgs/thumb/ads.jpg" alt="Ads Thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Detail End -->


</main>
@endsection

@push('scripts')
@endpush
