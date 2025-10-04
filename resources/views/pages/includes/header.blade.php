
<!-- header area start -->
<header>
  <div class="header__area">
    <div class="header__info">
      <div class="container">
        <div class="row">
          <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="header__info-left">
              <ul class="header__address">
                <li><span><i class="fa-solid fa-location-dot"></i></span>{{ $settings->address }}</li>
                <li>
                  <a href="mailto:{{ $settings->email }}"><span><i class="fa-solid fa-envelope"></i></span>
                    {{ $settings->email }}
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12  col-sm-12">
            <div class="header__info-right">
              <ul class="header__social">
                @if($settings->facebook!=null)
                  <li><a href="{{ $settings->facebook }}"><span><i class="fa-brands fa-facebook-f"></i></span></a></li>
                @endif
                @if($settings->twitter!=null)
                  <li><a href="{{ $settings->twitter }}"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                @endif
                @if($settings->instagram!=null)
                  <li><a href="{{ $settings->instagram }}"><span><i class="fa-brands fa-instagram"></i></span></a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="header__menu-area" id="header_menu">
      <div class="container">
        <div class="row">
          <div class="col-xxxl-3 col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-5">
            <div class="header__logo">
              <a href="{{ route('index') }}">
                <img class="logo-1" src="/pages/imgs/icon/logo.png" alt="Header Logo">
              </a>
            </div>
          </div>
          <div class="col-xxxl-9 col-xxl-9 col-xl-9 col-lg-3 col-md-3 col-2">
            <nav class="header__nav">
              <ul>
                <li><a href="{{ route('index') }}">INICIO</a>
                <li><a href="{{ route('services') }}">SERVICIOS <i class="fa-regular fa-angle-down"></i></a>
                  <ul class="main-dropdown">
                    @foreach ($allservices as $service)
                          <li><a href="{{ route('services.view', $service->slug) }}">{{ $service->label  }}</a></li>
                    @endforeach
                  </ul>
                </li>

                <li >
                  <a>DOCUMENTOS <i class="fa-regular fa-angle-down"></i></a>
                  <ul class="main-dropdown">
                    @foreach ($allsections as $section)
                      <li><a href="{{ route('publications.view',$section->slug) }}">{{ $section->label }}</a></li>
                    @endforeach
                    <li><a href="{{ route('politics') }}">Política de tratamiento de datos</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a >NUESTRO SISTEMA <i class="fa-regular fa-angle-down"></i></a>
                  <ul class="main-dropdown">
                    @foreach ($allsystems as $system)
                      <li><a href="{{ route('schemes.view',$system->slug) }}">{{ $system->label }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="{{ route('blogs') }}">BLOG</a>
                <li><a href="{{ route('contacts') }}">CONTÁCTENOS</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-xxxl-2 col-xxl-3 col-xl-3 col-lg-5 col-md-5 col-5">
            <div class="header__others">
              <div class="header__offcanvas" id="open_offcanvas">
                <span><i class="flaticon-align-left"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</header>
<!-- header area end -->



<!-- Offcanvas Area Start -->
<section class="offcanvas__area">
  <div class="offcanvas__inner">
    <div class="offcanvas__left ">

      <div class="side__navbar-wrapper">
        <nav class="side__navbar">
          <ul>

            <li><a href="{{ route('index') }}">INICIO</a>
            <li><a href="{{ route('services') }}">SERVICIOS</a>
              <ul class="main-dropdown">
                @foreach ($allservices as $service)
                          <li><a href="{{ route('services.view', $service->slug) }}">{{ $service->label  }}</a></li>
                        @endforeach
              </ul>
            </li>
            <li><a href="{{ route('blogs') }}">BLOG</a>
            <li >
              <a>PUBLICACIONES </a>
              <ul class="main-dropdown">
                @foreach ($allsections as $section)
                  <li><a href="{{ route('publications.view',$section->slug) }}">{{ $section->label }}</a></li>
                @endforeach
              </ul>
            </li>

            <li class="dropdown">
              <a >NUESTRO SISTEMA <i class="<i class="fa-regular fa-angle-down"></i></i></a>
              <ul class="main-dropdown">
                @foreach ($allsystems as $system)
                  <li><a href="{{ route('schemes.view',$system->slug) }}">{{ $system->label }}</a></li>
                @endforeach
              </ul>
            </li>

            <li><a href="{{ route('contacts') }}">CONTACTO</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="offcanvas__right">
      <div class="offcanvas__logo">
        <a href="{{ route('index') }}"><img src="/pages/imgs/icon/logo.png" alt="Site Logo"></a>
      </div>
      <div class="offcanvas__contact">
        <ul>
          <li>
            <span>Dirección</span>
            <a>{{ $settings->address }}</a>
          </li>
          <li>
            <span>Llamanos</span>
            <a href="tel:+{{ $settings->cellphone }}">+{{ $settings->cellphone }}</a>
          </li>
          <li>
            <span>Email Us</span>
            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Offcanvas Area End -->
