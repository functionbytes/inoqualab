@extends('layouts.pages')
@section('title', 'Inicio')
@section('content')
<section class="service__detail wow wcfadeUp" data-wow-delay="0.3s" >
    <div class="container line">

      <div class="row g-0">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
          <div class="service__sidebar">
            <div class="widget__service ">
              <h2 class="widget__title">Mas Servicios</h2>
              <ul>
                @foreach ($allservices as $item)
                    @if($service->id == $item->id)
                        <li><a class="active"  href="{{ route('services.view', $item->slug) }}">{{ $item->label  }}</a></li>
                    @else
                        <li><a href="{{ route('services.view', $item->slug) }}">{{ $item->label  }}</a></li>
                    @endif
                @endforeach
              </ul>
            </div>


            @if($service->pdf() != null)
                <div class="widget__download ">
                    <h2 class="widget__title">Descargas</h2>
                    <ul>
                    <li><a target="_blank" href="/pages/imgs/services/{{ $service->pdf()->filename }}">Brochure <span><i class="flaticon-download"></i></span></a></li>
                    </ul>
                </div>
            @endif
            <div class="widget__contact " >
              <p>Contacto</p>
              <h3>¿Necesitas información sobre tarifas y servicios adicionales? </h3>
              <a class="btn-hover" href="{{ route('applications') }}"><span></span> COTIZA AQUÍ</a>
            </div>
          </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
          <div class="service__detail-content ">
            @if ($service->thumbnail() != null)
                <img class="service__detail-thumb" src="/pages/imgs/services/{{ $service->thumbnail()->filename }}" alt="{{ $service->slug }}">
            @else
                <img class="service__detail-thumb" src="/pages/imgs/services/default.jpg" alt="{{ $service->slug }}">
            @endif

            <h2 class="service__detail-title">{{ $service->label }}</h2>

              @if($service->slug == "microbiological")
            
              
              <p>Contamos con microbiólogos industriales calificados en análisis de:</p>
              
              <ul class="feature__list">
                <li>+ Alimentos y bebidas para consumo humano.</li>
                <li>+ Agua potable, envasada y agua de uso recreativo.</li>
                <li>+ Control de calidad en superficies de equipos, manipuladores y ambientes.</li>
                <li>+ Cosméticos. </li>
                
              </ul>

              <p>Utilizando métodos y técnicas validadas, con equipos de última tecnología, asegurando un control de calidad sistemático y generando resultados con mayor confiabilidad en menor tiempo.</p>

              
                
              @elseif($service->slug == "physicochemical")

              
              <p>Contamos con químicos calificados en análisis de:</p>
              
              <ul class="feature__list">
                <li>+ Agua potable, envasada y aguas de uso recreativo.</li>
                <li>+ Determinación de la composición humedad, proteína y grasa en alimentos.</li>
                <li>+ Tabla nutricional.</li>
                <li>+ Análisis bromatológicos.</li>
              </ul>

              <p>Utilizando métodos y técnicas validadas, con equipos de última tecnología, asegurando un control de calidad sistemático y generando resultados con mayor confiabilidad en menor tiempo.</p>

              

              
              @elseif($service->slug == "usefullife")
                

              <p>Análisis del comportamiento microbiológico, fisicoquímico y sensorial de los alimentos en condiciones de almacenamiento controladas, durante un periodo de tiempo a partir de su fecha de elaboración. Este incluye un informe estadístico de comportamiento microbiológico y fisicoquímico de los productos.</p>
              
              

              
              @elseif($service->slug == "validation")
              
              <p>Te ayudamos a validar la efectividad en los procesos de limpieza y desinfección de las instalaciones, superficies, manipuladores y equipos, garantizando las condiciones sanitarias para la producción.</p>
              
              
              @elseif($service->slug == "training")
              
                <p>Capacítate con nosotros, aprueba las evaluaciones y certifícate fácilmente.</p>
                <p>Resolución 2674 de 2013 del Ministerio de Salud y otras normatividades específicas para cada sector.</p>
                <a href="https://capacitacion.inoqualab.com" class="btn  btn-primary mt-2 px-10">INGRESAR</a>
              
              @elseif($service->slug == "pathogens")
              
              <p>Son bacterias que pueden provocar patologías tras su ingesta, causada comúnmente por alimentos contaminados.</p>
              
              <ul class="feature__list">
                <li class="italic">+ Listeria monocytogenes</li>
                <li class="italic">+ Salmonella sp</li>
                <li class="italic">+ Campylobacter sp.<li>
                  <li class="italic">+ Cronobacter sp.<li>
                <li class="italic">+ Vibrio cholerae</li>
                <li class="italic">+ E. coli O157.H7</li>
                <li class="italic">+ E. coli STEC</li>
              </ul>
              @endif
         

          </div>
        </div>
      </div>
    </div>
  </section>

   
@endsection
@push('scripts')
@endpush
