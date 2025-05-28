<nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="/assets/images/logo/main.png" alt="logo" class="brand" data-src="/assets/images/logo/main.png" data-src-retina="/assets/images/logo/main.png" width="170" height="45">
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="{{ route('manager.dashboard') }}" class="detailed">
              <span class="title">Dashboard</span>
              <span class="details">12 New Updates</span>
            </a>
            <span class="icon-thumbnail"><i data-feather="shield"></i></span>
          </li>
          
          <li>
            <a href="javascript:;"><span class="title">Productos</span> 
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="map-pin"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.products.index') }}">Listado</a>
                <span class="icon-thumbnail">gm</span>
              </li>
              <li class="">
                <a href="{{ route('manager.products.create') }}">Crear</a>
                <span class="icon-thumbnail">vm</span>
              </li>
              
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Ventas</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="calendar"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.sales.index') }}">Listado</a>
                <span class="icon-thumbnail">c</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.create') }}">Crear</a>
                <span class="icon-thumbnail">c</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.cancellations') }}">Procesar</a>
                <span class="icon-thumbnail">M</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.records') }}">Historial</a>
                <span class="icon-thumbnail">L</span>
              </li>
              <li class="">
                <a href="{{ route('home') }}" target="_blank">Documentation</a>
                <span class="icon-thumbnail">D</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Ordenes</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="layout"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.sales.index') }}">Listado</a>
                <span class="icon-thumbnail">dl</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.create') }}">Crear</a>
                <span class="icon-thumbnail">dl</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.records') }}">Historial</a>
                <span class="icon-thumbnail">rl</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Inventario</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="square"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.inventaries.index') }}">Inventario</a>
                <span class="icon-thumbnail">bt</span>
              </li>
              <li class="">
                <a href="{{ route('manager.inventaries.records') }}">Historial</a>
                <span class="icon-thumbnail">dt</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <span class="title">Cotizaciones</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i data-feather="list"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.quotations.index') }}">Listado</a>
                <span class="icon-thumbnail">fl</span>
              </li>
              <li class="">
                <a href="{{ route('manager.quotations.index') }}">Crear</a>
                <span class="icon-thumbnail">fe</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Eventos</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="square"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.events.index') }}">Listado</a>
                <span class="icon-thumbnail">fl</span>
              </li>
              <li class="">
                <a href="{{ route('manager.sales.create') }}">Crear</a>
                <span class="icon-thumbnail">fe</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Usuarios</span> 
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="map-pin"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.users.index') }}">Listado</a>
                <span class="icon-thumbnail">gm</span>
              </li>
              <li class="">
                <a href="{{ route('manager.users.create') }}">Crear</a>
                <span class="icon-thumbnail">vm</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Clientes</span> 
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="map-pin"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.customers.index') }}">Listado</a>
                <span class="icon-thumbnail">gm</span>
              </li>
              <li class="">
                <a href="{{ route('manager.customers.create') }}">Crear</a>
                <span class="icon-thumbnail">vm</span>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;"><span class="title">Publicidad</span> 
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="map-pin"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('manager.commercials.index') }}">Listado</a>
                <span class="icon-thumbnail">gm</span>
              </li>
              <li class="">
                <a href="{{ route('manager.commercials.create') }}">Crear</a>
                <span class="icon-thumbnail">vm</span>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;"><span class="title">Extra</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i data-feather="box"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('home') }}">Configuraciones</a>
                <span class="icon-thumbnail">in</span>
              </li>
              <li class="">
                <a href="404.html">404 Page</a>
                <span class="icon-thumbnail">pg</span>
              </li>
              <li class="">
                <a href="{{ route('home') }}">Faqs</a>
                <span class="icon-thumbnail">bp</span>
              </li>
              <li class="">
                <a href="{{ route('manager.notifications.index') }}">Notificaciones</a>
                <span class="icon-thumbnail">l</span>
              </li>
              <li class="">
                <a href="{{ route('manager.alerts.index') }}">Alertas</a>
                <span class="icon-thumbnail">re</span>
              </li>
              <li class="">
                <a href="{{ route('home') }}">Mensajeros</a>
                <span class="icon-thumbnail">gl</span>
              </li>
              <li class="">
                <a href="{{ route('manager.tags.index') }}">Tags</a>
                <span class="icon-thumbnail">t</span>
              </li>
              <li>
                <a href="{{ route('manager.categories.index') }}">Categorias</a>
                <span class="icon-thumbnail">L1</span>
              </li>
              <li>
                <a href="">Porciones</a>
                <span class="icon-thumbnail">L1</span>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="https://docs.pages.revox.io/" target="_blank"><span class="title">Docs</span></a>
            <span class="icon-thumbnail"><i data-feather="life-buoy"></i></span>
          </li>
          <li class="">
            <a href="http://changelog.pages.revox.io/" target="_blank"><span class="title">Changelog</span></a>
            <span class="icon-thumbnail">CG</span>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>