<header id="header" class="tra-menu navbar-dark inner-page-header white-scroll">
    <div class="header-wrapper">

        <div class="wsmobileheader clearfix">
            <span class="smllogo">
                <img src="/pages/images/logo-blue.png" alt="mobile-logo">
            </span>
            <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        </div>

        <div class="wsmainfull menu clearfix">
            <div class="wsmainwp clearfix">

                <div class="desktoplogo">
                    <a href="{{ route('index') }}" >
                        <img  src="/pages/images/logo-blue.png"  alt="" />
                    </a>
                </div>

                <nav class="wsmenu clearfix" style="height: 1234px;"><div class="overlapblackbg"></div>
                    <ul class="wsmenu-list nav-theme">

                        <!-- DROPDOWN SUB MENU -->
                        <li aria-haspopup="true"><span class="wsmenu-click"><i class="wsmenu-arrow"></i></span><a href="#" class="h-link">About <span class="wsarrow"></span></a>

                        </li>

                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{ route('faqs') }}" class="h-link">Case Studies</a>
                        </li>

                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{ route('faqs') }}" class="h-link">Pricing</a>
                        </li>

                        <li class="nl-simple" aria-haspopup="true">
                            <a href="{{ route('faqs') }}" class="h-link">Preguntas</a>
                        </li>

                        <li class="nl-simple" aria-haspopup="true">
                            <a  class="btn r-04 btn--theme hover--theme last-link">
                                Solicita información
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

    </div>
</header>
