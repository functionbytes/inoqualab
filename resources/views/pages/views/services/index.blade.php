@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')
<!-- Breadcreumb Area Start -->



<!-- Case Study Area Start -->
<section class="case-study__area-4 wow wcfadeUp" data-wow-delay="0.3s" >
  <div class="container line">

    <div class="case-study__title-wrapper-3 " >
      <div class="row">
        <div class="col-xxl-12">
          <div class="service__title-wrapper-3">
              <h2 class="section-sub-title wow wcfadeUp" >INOQUALAB</h2>
              <h3 class="section-title wow wcfadeUp" >Nuestros servicios</h3>
              <p class="wow wcfadeUp" >Nuestros profesionales proporcionan información referente a cotización de servicios, normas aplicables, pruebas a realizar, técnicas y métodos empleados, para el análisis de alimentos y aguas.</p>
          </div>
      </div>
      </div>
    </div>
  </div>

  <div class=" container mb-5   ">
    <div class=" row projects-container">
      @foreach ($services as $service)
        <div class="col-sm-12 col-md-4">
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
  </div>

</section>

@endsection

@push('scripts')
@endpush



