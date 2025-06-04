


@if(count($faqs)>0)

<!-- FAQ Area Start -->
<section class="faq__area wow wcfadeUp" data-wow-delay="0.15s" >
  <div class="container line">
    <div class="row g-0">
      
      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
        <div class="faq__right zi-9  text-center">
          <h3 class="section-sub-title" >Teiens dudas</h3>
          <h4 class="section-title " >Preguntas <span>frecuentes</span>
          </h4>

          <div class="faq__list-2  mt-4" >
            <div class="accordion" id="accordionExample">
              @foreach ($faqs as $faq)
                <div class="accordion-item">
                  <h2 class="faq__title-2" id="headingOne">
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}" class="collapsed">
                      {{ $faq->label }}
                    </button>
                  </h2>
                  <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>{{ $faq->description }}</p>
                    </div>
                  </div>
                </div>
              @endforeach


            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
@endif