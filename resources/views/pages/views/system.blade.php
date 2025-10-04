@extends('layouts/pages')


@section('content')
<section class="about__area-3">
   <div class="container line">
     <span class="line-3"></span>
     <span class="line-4"></span>
     <span class="line-5"> </span>
     <div class="row g-0">
       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
         <div class="about__left zi-9 wow wcfadeUp" data-wow-delay="0.3s" >
           <img src="/pages/imgs/home/about.jpg" alt="About Image" class="about__thumb-3" >
         </div>
       </div>
       <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
         <div class="about__right-3">
           <h2 class="section-sub-title-2 wow wcfadeUp" data-wow-delay="0.15s" >NUESTRO SISTEMA</h2>
           <h3 class="section-title wow wcfadeUp" data-wow-delay="0.3s" >Sistema de información inoqualab</h3>
           <p class="wow wcfadeUp text-justify" data-wow-delay="0.45s" >Mediante nuestro SISTEMA DE INFORMACIÓN podrás consultar y descargar actas de recibido, informes preliminares,
          resultado, facturación, entre otras funciones que te ayudarán a optimizar los procesos en tu empresa.</p>

           <a href="{{ $settings->url }}" class="wc-btn-secondary btn-hover wow wcfadeUp mt-4" style="visibility: visible; animation-name: wcfadeUp;"><span style="top: 182.547px; left: 186.5px;"></span>
            Ingrese aquí</a>
            
            <a href="{{ $settings->instructive }}"  class="wc-btn-secondary btn-hover wow wcfadeUp mt-4"data-gtf-mfp="true" data-mfp-options="{&quot;type&quot;:&quot;iframe&quot;}"><span style="top: 182.547px; left: 186.5px;"></span>
              Instructivo</a>

         </div>
       </div>
     </div>
   </div>
 </section>
@endsection



