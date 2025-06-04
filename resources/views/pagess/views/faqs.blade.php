@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')



<!-- Contact Area Start -->
<section class="faq__area wow wcfadeUp" data-wow-delay="0.3s">
  <div class="container line">
    <div class="row">

      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mb-8">
        <div class="service__title-wrapper-3">
          <h3 class="section-title " >Preguntas frecuentes</h3>
        </div>
    </div>
     
      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
        <div class="faq__content ">
          <div class="faq__list-2">
            <div class="accordion" id="accordionExample">
             
              @foreach ($faqs as $faq)
                <div class="accordion-item">
                  <h2 class="faq__title-2" id="heading{{ $faq->id }}">
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}" class="collapsed">
                      {{ $faq->label }}
                    </button>
                  </h2>
                  <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>{!! $faq->description !!}</p>
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
<!-- Contact Area End -->


@include ('pages.partials.sections.home.calltoaction')


@endsection

@push('scripts')
@endpush


