

@if(count($cases)>0)

<section class="company__area-5 line">
    <div class="container ">
    
  
      <div class="row">
        <div class="col-xxl-12">
  
          <div class="service__title-wrapper-3">
         
            <h2 class="section-sub-title  wow wcfadeUp" data-wow-delay="0.3s" > CASOS DE ÉXITO</h2>
            <h4 class="section-title wow wcfadeUp" data-wow-delay="0.3s" >Estos son algunos de los proyectos <br>que hemos hecho realidad.</h4>
       
           </div>
  
          <div class="company__logos partners-active owl-carousel">
            @foreach ($cases as $case)
              <div class="company__logo wow wcfadeUp " data-wow-delay="0.15s" >
                @if ($case->thumbnail() != null)
                  <img src="/pages/imgs/cases/{{ $case->thumbnail()->filename }}" alt="company Logo">
                @else
                  <img src="/pages/imgs/cases/default.png" alt="company Logo">
                @endif
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
  
    </div>
  </section>
@endif
  