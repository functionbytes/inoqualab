
@if(count($sliders)>0)

<section class="hero__area">
  <div class="swiper hero__slider">
    <div class="swiper-wrapper">
    @foreach ($sliders as $slider)
        
    @if ($slider->thumbnail() != null)
      <div class="swiper-slide hero__slide" style="background-image: url(/pages/imgs/sliders/{{ $slider->thumbnail()->filename }});">
    @else
    <div class="swiper-slide hero__slide" style="background-image: url(/pages/imgs/sliders/default.jpg);">
    @endif
      <div class="titlebar-overlay lqd-overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-10">
              <div class="hero__slide-left">
                <h1>{!! $slider->label !!}</h1>
                @if ($slider->description!= null )
                  <p>{{ $slider->description }}.</p>
                @endif
                @if ($slider->url!= null )
                <a class="wc-btn-primary btn-hover" href="{{ $slider->url }}"><span></span> Más Información</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>

    <div class="hero__slider-pagination">
      <div class="swiper-button-next"><span><img src="/pages/imgs/icon/long-arrow-left.png" alt=""></span> Siguiente
      </div>
      <div class="swiper-button-prev">Anterior <span><img src="/pages/imgs/icon/long-arrow-right.png" alt=""></span>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>   @endif