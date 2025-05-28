


<div class="deznav">
    <div class="deznav-scroll">
       <ul class="metismenu" id="menu">
          <li>
            <a href="{{ route('manager.dashboard') }}" class="ai-icon" data-toggle="tooltip" data-placement="right" title="Dashboard" data-original-title="Dashboard">
                <i class="flaticon-381-presentation"></i>
             <span class="nav-text">Dashboard</span>
             </a>
          </li>

          <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
               <i class="flaticon-381-layer-1"></i>
                  <span class="nav-text">Pagina</span>
               </a>
               <ul aria-expanded="false">
                  <li><a href="{{ route('manager.services') }}">Servicios</a></li>
                  <li><a href="{{ route('manager.partners') }}">Aliados</a></li>
                  <li><a href="{{ route('manager.faqs') }}">Preguntas</a></li>
                  <li><a href="{{ route('manager.sliders') }}">Sliders</a></li>
                   <li><a href="{{ route('manager.testimonials') }}">Testimonios</a></li>
                   <li><a href="{{ route('manager.canals') }}">Canales</a></li>
                   <li><a href="{{ route('manager.contacts') }}">Contactenos</a></li>
                   <li><a href="{{ route('manager.applications') }}">Cotizaciones</a></li>
                   <li class="">
                         <a class="has-arrow" >Blogs</a>
                         <ul  class="mm-collapse">
                            <li><a href="{{ route('manager.blogs') }}">Blogs</a></li>
                             <li><a href="{{ route('manager.categories') }}">Categorias</a></li>
                             <li><a href="{{ route('manager.tags') }}">Tags</a></li>
                         </ul>
                     </li>
                   <li class="">
                       <a class="has-arrow" >Publicaciones</a>
                       <ul  class="mm-collapse">
                           <li><a href="{{ route('manager.publications') }}">Publicaciones</a></li>
                           <li><a href="{{ route('manager.sections') }}">Categorias</a></li>
                       </ul>
                   </li>
                   <li class="">
                       <a class="has-arrow" >Escenas</a>
                       <ul  class="mm-collapse">
                           <li><a href="{{ route('manager.schemes') }}">Escenas</a></li>
                           <li><a href="{{ route('manager.systems') }}">Categorias</a></li>
                       </ul>
                   </li>
               </ul>
           </li>


           <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
               <i class="flaticon-381-box"></i>
                  <span class="nav-text">PQRS</span>
               </a>
               <ul aria-expanded="false">
                  <li><a href="{{ route('manager.petitions') }}">Peticiones</a></li>
                  <li><a href="{{ route('manager.dependencies') }}">Dependencias</a></li>
               </ul>
           </li>

          <li><a href="{{ route('manager.configurations') }}"
            class="ai-icon" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Sedes" data-original-title="Sedes">
             <i class="flaticon-381-settings-3"></i>
             <span class="nav-text">Configuracion</span>
             </a>
          </li>
          <li><a href="{{ route('manager.users') }}"
            class="ai-icon" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Usuarios" data-original-title="Usuarios">
             <i class="flaticon-381-user-1"></i>
             <span class="nav-text">Usuarios</span>
             </a>
          </li>
       </ul>
       <br>
       <div class="copyright">
          <p>Made with <i class="fa fa-heart"></i> by Mimmers</p>
       </div>
    </div>
 </div>
