@if(count($services)>0)
<section class="service__area wow wcfadeUp" data-wow-delay="0.6s">
    <div class="container line">
      <div class="row">
        <div class="col-xxl-12">
          <div class="service__title-wrapper-3">
            <h2 class="section-sub-title " >INOQUALAB</h2>
            <h3 class="section-title" >Nuestros Servicios</h3>
           
              <p>Nuestros profesionales proporcionan información referente a cotización de servicios, normas aplicables, pruebas a realizar, técnicas y métodos empleados, para el análisis de alimentos, aguas y cosméticos.</p>
         
          </div>
        </div>
      </div>

       
        <div class="service__slider-wrapper">
            <div class="swiper service__slider swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-d71d1724363fbf49" aria-live="polite" >
                   @foreach ($allservices as $service)
                  

                    <div class="swiper-slide service__slide wow wcfadeUp swiper-slide-active" data-wow-delay="0.6s" data-swiper-slide-index="0" role="group" aria-label="1 / 5" >
                        <article class="pbmit-portfolio-style-2">
                            <div class="pbminfotech-post-item">
                              <div class="pbmit-image-wrapper">
                                  <div class="pbmit-featured-wrapper">
                                    @if ($service->thumbnail() != null)
                                    <img class="img-fluid" src="/pages/imgs/services/{{ $service->thumbnail()->filename }}" alt="{{ $service->slug }}">
                                    @else
                                        <img class="img-fluid" src="/pages/imgs/services/default.jpg" alt="{{ $service->slug }}">
                                    @endif
                                  </div>
                              </div>
                              <div class="pbmit-content-wrapper">
                                  <div class="pbmit-port-cat">
                                    <a rel="tag">SERVICIOS</a>
                                  </div>
                                  <h3 class="pbmit-portfolio-title">
                                    <a href="{{ route('services.view', $service->slug) }}">{{ $service->label }}</a>
                                  </h3>
                                  <div class="pbmit-link-icon">
                                    <a href="{{ route('services.view', $service->slug) }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                  </div>
                              </div>
                            </div>
                        </article>
                      </div>

                   @endforeach
                    
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>

            <div class="service__btn-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-d71d1724363fbf49"><span><i class="fa-solid fa-arrow-left"></i></span></div>
            <div class="service__btn-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-d71d1724363fbf49"><span><i class="fa-solid fa-arrow-right"></i></span></div>
        </div>

        <div class="row">
            <div class="col-xxl-12">
              <div class="service__btm wow wcfadeUp" data-wow-delay="0.75s" >
                <p>Para más información sobre nuestros servicios <a href="{{ route('applications') }}">cotizar <i class="fa-solid fa-arrow-left"></i></a>
                </p>
              </div>
            </div>
          </div>

    </div>
</section>


@endif
