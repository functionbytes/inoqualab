
<footer class="background-luminosity overlay-black-dark" style="background-image: url(/pages/images/footer/slider-bg2.jpg)">
    
  <div class="footer-subscribe-wrapper">
    <div class="container">
        <div class="wrapper-inner">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-9 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="title text-white m-b0">No te pierdas nuestras actualizaciones</h3>
                </div>
                <div class="col-xl-6 col-lg-9 wow fadeInUp" data-wow-delay="0.4s">
                    <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                        <div class="dzSubscribeMsg text-white"></div>
                        <div class="input-group">
                            <input name="dzEmail" required="required" type="email" class="form-control transparent m-r20" placeholder="Ingresa tu celular...">
                            <button name="submit" value="Submit" type="submit" class="btn btn-primary">
                                <span>SUSCRIBIRME</span>
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer__area">
      <div class="footer__top">
        <div class="container">
          <div class="row">
            <div class="col-xxl-4 col-md-4">
              <div class="footer__widget">
               
                <h3 class="footer__widget-title">Sobre nosotros</h3>
                {!! $settings->description !!}
              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="footer__widget footer__widget-2">
                <h3 class="footer__widget-title">Información</h3>
                <ul class="footer__quick-link">
                  <li><a href="{{ route('about') }}">Quienes somos</a></li>
                  <li><a href="{{ route('faqs') }}">Preguntas Frecuentes</a></li>
                  <li><a href="{{ route('system') }}">Nuestro Sistema</a></li>
                  <li><a href="{{ route('pqrsf') }}">PQRSF</a></li>
                  <li><a href="{{ route('canals') }}">Canales de comunicación</a></li>
                  <li><a href="{{ route('contacts') }}">Contacto</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="footer__widget footer__widget-3">
                <h3 class="footer__widget-title">Contactanos</h3>
                <ul class="footer__address">
                  <li><a>{{ $settings->address }}</a></li>
                  <li><a class="phone" href="tel:+{{ $settings->cellphone }}">+{{ $settings->cellphone }}</a></li>
                  @if($settings->optional!=null)
                    <li><a class="phone" href="tel:+{{ $settings->optional }}">+{{ $settings->optional }}</a></li>
                  @endif
                  <li><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="container">
          <div class="row">
              <div class="footer__bottom-inner">
                <div class="footer__copyright">
                  <p>{{ $settings->copyright }}</p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>