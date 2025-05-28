

@if(count($partners)>0)

<section class="company__area-5 line wow wcfadeUp" data-wow-delay="0.15s">
    <div class="container ">
    
  
      <div class="row">
        <div class="col-xxl-12">
  
  
          <div class="company__logos partners-active owl-carousel">
            @foreach ($partners as $partner)
              <div class="company__logo wow wcfadeUp " >
                @if ($partner->thumbnail() != null)
                  @if($partner->pdf() != null)
                      <a target="_blank" href="/pages/imgs/partners/{{ $partner->pdf()->filename }}">
                          <img src="/pages/imgs/partners/{{ $partner->thumbnail()->filename }}" alt="company Logo">
                      </a>
                  @else
                      <img src="/pages/imgs/partners/{{ $partner->thumbnail()->filename }}" alt="company Logo">
                 @endif

                @else 
                  @if($partner->pdf() != null)
                    <a target="_blank" href="/pages/imgs/partners/{{ $partner->pdf()->filename }}">
                      <img src="/pages/imgs/partners/default.png" alt="company Logo">
                    </a>
                  @else
                    <img src="/pages/imgs/partners/default.png" alt="company Logo">
                  @endif
                @endif
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
  
    </div>
  </section> @endif
  