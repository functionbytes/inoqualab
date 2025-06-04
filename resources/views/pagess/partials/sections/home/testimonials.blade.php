
@if(count($testimonials)>0)
<section class="pt-10 pb-11 wow wcfadeUp" data-wow-delay="0.15s" data-animated-id="6">
  <div class="container text-center">
    <h2 class="section-sub-title " >INOQUALAB</h2>
    <h2 class="text-center lh-1625 text-dark mb-5">
      Que dicen nuestros clientes sobre nosotros
    </h2>
    <div class="testimonials vertical-slider slider">
          @foreach ($testimonials as $testimonial)
             <div class=" card p-6 fadeInUp animated" data-animate="fadeInUp">
                <div class="card-body p-0 text-center">
                  <span class="text-primary fs-26 lh-1 mb-4 d-block">
                    <i class="fas fa-quote-left"></i>
                  </span>
                  <p class="card-text fs-15 lh-2 mb-4">
                   {!! $testimonial->description!!}
                  </p>
                  <span class="mx-auto divider mb-5"></span>
                  <img src="/pages/imgs/testimonial.jpg" class="rounded-circle d-inline-block mb-2" alt="Lydia Wise">
                  <p class="fs-16 lh-214 text-dark font-weight-500 mb-0">{{ $testimonial->names  }}</p>
                  <p class="mb-0">Cliente</p>
                </div>
              </div>
          @endforeach
        </div>
      </div>

</section>
@endif

