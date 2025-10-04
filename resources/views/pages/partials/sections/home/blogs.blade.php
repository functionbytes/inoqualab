


@if(count($blogs)>0)
<section class="blog__area">
  <div class="container line">

    <div class="blog__top">
      <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
          <div class="blog__title-wrapper">
            <h2 class="section-sub-title wow wcfadeUp" data-wow-delay="0.15s" style="visibility: visible; animation-delay: 0.15s; animation-name: wcfadeUp;">Blogs Recientes</h2>
            <h3 class="section-title wow wcfadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: wcfadeUp;">Últimas noticias
              </h3>
          </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
          <div class="blog__btn wow wcfadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: wcfadeUp;">
            <a href="{{ route('blogs') }}">Explorar todo<i class="fa-solid fa-arrow-right-long"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="blog__btm">
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <div class="blog__item-wrapper-2 "s>
            <article>
              <div class="blog__img">
                <a href="{{ route('blogs.view', $blog->slug) }}">
                    @if($blog->thumbnail()!=null)
                          <img src="{{ asset('/pages/imgs/blogs/'.$blog->thumbnail()->filename) }}" alt="image">
                      @else
                            <img src="{{ asset('/pages/imgs/blogs/default.jpg') }}" alt="image">
                      @endif
                </a>
              </div>
              <div class="blog__content-2">
                <h4 class="blog__meta"> <strong>
                  <a href="{{ route('blogs.categories', $blog->categorie->slug) }}">{{ $blog->categorie->label }}</a></strong>
                </h4>
                <span class="fs-13">{{ humanize_date($blog->created_at) }}</span>
                <a href="{{ route('blogs.view', $blog->slug) }}">
                  <h5 class="blog__title-2"> {{substr(strip_tags($blog->label), 0, 400)}}</h5>
                </a>
              </div>
            </article>
          </div>
        </div>
        
        @endforeach
        
        <div cla
      </div>
    </div>
  </div>
</section>
@endif
