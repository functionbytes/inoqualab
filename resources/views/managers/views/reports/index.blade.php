@extends('layouts.managers')

@section('content')

    <script src="{{ asset('manager/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('manager/assets/js/datatables.js') }}" type="text/javascript"></script>


      <div class="content ">



        <div class="jumbotron">
            <div class=" container p-l-0 p-r-0   container-fixed-lg sm-p-l-0 sm-p-r-0" style=" height: 50px;">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Cursos</li>
                </ol>
              </div>
            </div>
          </div>


          <div class=" no-padding container-fixed-lg bg-white">
            <div class="container">
              <!-- START card -->
              <div class="card card-transparent">
                <div class="card-header ">
                  <div class="card-title">Listado Cusos
                  </div>
                  <div class="pull-right">
                      <div class="pull-right row">
                        <div class="col-xs-6">
                            <small>{{ link_to_route('managers.courses.create', __('Añadir'), [], ['class' => 'btn btn-info btn-cons']) }}</small>
                        </div>
                          <div class="col-xs-6">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Bucar">
                          </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="card-block">
                 <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Titulo</th>
                            <th style="width: 15%;">Categoria</th>
                            <th style="width: 15%;">Estado</th>
                            <th style="width: 20%;">Fecha Creacion</th>
                            <th class="text-center" style="width: 30%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($courses as $course)
                                    <tr>
                                      <td class="v-align-middle semi-bold">
                                        <p>{{ $course->title }}</p>
                                      </td>
                                      <td class="v-align-middle semi-bold">
                                        <p>{{ $course->schedule->title }}</p>
                                      </td>


                                      <td class="v-align-middle semi-bold">
                                        @if($course->authorized == 1)
                                          <a href="#" class="btn btn-tag-blue">Activo</a>
                                        @else
                                          <a href="#" class="btn btn-tag-red">Inactivo</a>
                                        @endif
                                      </td>
                                      <td class="v-align-middle">
                                        <p>{{ humanize_date($course->crated_at) }}</p>
                                      </td>
                                      <td class="v-align-middle text-center">
                                        <a  href="{{ route('managers.courses.edit', $course->slug) }}" data-original-title="Eliminar" style="margin:5px; color: #222222;">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a  href="{{ route('managers.courses.destroy', $course->slug) }}" data-original-title="Eliminar" style="margin:5px; color: #222222;">
                                            <i class="fs-14 pg-trash" aria-hidden="true"></i>
                                        </a>
                                      </td>
                                    </tr>
                          @endforeach
                    </tbody>
              </table>

                </div>
              </div>
            </div>
          </div>

      </div>

@endsection
