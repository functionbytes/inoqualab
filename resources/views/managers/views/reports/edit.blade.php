@extends('layouts.managers')

@section('content')


<script src="{{ asset('manager/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/plugins/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/js/manager/outs.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/js/manager/out.js') }}" type="text/javascript"></script>
<script src="{{ asset('manager/assets/js/galeries.js') }}" type="text/javascript"></script>

<script  type="text/javascript">
/*
  $("#thumbnail").change(function() {
    //$('#labelImagen').attr("text", "Certificado Adjuntado");
  });
*/

</script>




      <div class="content ">

          <br></br>

           <div class=" no-padding container-fixed-lg bg-white">
            <div class="container">
              <div class="row">

                <div class="col-md-5">
                  <div class="card card-transparent">
                    <div class="card-header ">
                      <div class="card-title">Conferencias
                      </div>
                    </div>
                    <div class="card-block">
                      <h3>Editar Conferencias</h3>

                    </div>
                  </div>
                </div>

                <div class="col-md-7">


                    <br>

                  <div class="card card-transparent">

                    <div class="card-block">

                      {!! Form::open(['route' => ['managers.courses.update', $course->slug], 'method' =>'POST', 'files' => true ,'enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="form-group-attached">

                                                  <div class="row clearfix">
                                                    <div class="col-md-12">
                                                      <div class="form-group form-group-default required">
                                                        <label>Titulo</label>
                                                        {!! Form::text('title', $course->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}
                                                        @if ($errors->has('title'))
                                                          <span class="invalid-feedback">{{ $errors->first('title') }}</span>
                                                        @endif
                                                      </div>
                                                    </div>
                                                  </div>


                                                  <div class="row clearfix">
                                                    <div class="col-md-6">
                                                    <div class="form-group form-group-default form-group-default-select2 required">
                                                          <label>Salon</label>
                                                          {!! Form::select('room_id', $rooms, $room , ['class' => 'full-width select','type' => 'text' ,'name' => 'room_id' ,'id' => 'room_id' , 'data-init-plugin' => 'select2']) !!}
                                                            @if ($errors->has('room_id'))
                                                                <span class="invalid-feedback">{{ $errors->first('room_id') }}</span>
                                                          @endif
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default input-group required">
                                                          <div class="form-input-group">
                                                            <label class="inline">Estado</label>
                                                          </div>
                                                          <div class="input-group-append h-c-50">
                                                            <span class="input-group-text transparent">
                                                                @if($course->authorized == 1)
                                                                    <input type="checkbox" id="authorized" class="switchery" name="authorized"   data-init-plugin="switchery" data-size="small" checked="checked" />
                                                                  @else
                                                                    <input type="checkbox" id="authorized"  class="switchery" name="authorized"    data-init-plugin="switchery" data-size="small" />
                                                                  @endif
                                                            </span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>

                                                  <div class="row clearfix">
                                                    <div class="col-md-6">
                                                      <div class="form-group form-group-default form-group-default-select2 required">
                                                        <label>Modalidad</label>
                                                        {!! Form::select('schedule_id', $schedules, $schedule , ['class' => 'full-width select','type' => 'text' ,'name' => 'schedule_id' ,'id' => 'schedule_id' , 'data-init-plugin' => 'select2']) !!}
                                                          @if ($errors->has('schedule_id'))
                                                               <span class="invalid-feedback">{{ $errors->first('schedule_id') }}</span>
                                                         @endif
                                                       </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default input-group">
                                                            <div class="form-input-group">
                                                            <label>Fecha</label>
                                                                <input id="datepicker" name="release" type="text" value="{{ input_date($course->release)}}"  class="form-control" data-date-format="dd-mm-yyyy" autocomplete="off"  >
                                                            </div>
                                                        </div>
                                                      </div>
                                                  </div>

                                                  <div class="row clearfix">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default input-group">
                                                            <div class="input-group bootstrap-timepicker">
                                                                <label>Hora Inicial</label>
                                                                <input id="initiation_at"  name="initiation" value="{{ humanize_time($course->initiation) }}" type="text" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group form-group-default input-group">
                                                            <div class="input-group bootstrap-timepicker">
                                                                <label>Hora Final</label>
                                                                <input id="ending_at"  name="ending"  value="{{ humanize_time($course->ending) }}" type="text" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                      </div>
                                                   </div>


                                                  <div class="row clearfix">
                                                    <div class="col-md-12">
                                                      <div class="form-group form-group-default ">
                                                        <label>Link Conferencia</label>
                                                        {!! Form::text('online', $course->online, ['class' => 'form-control' . ($errors->has('online') ? ' is-invalid' : '')]) !!}
                                                        @if ($errors->has('online'))
                                                          <span class="invalid-feedback">{{ $errors->first('online') }}</span>
                                                        @endif
                                                      </div>
                                                    </div>
                                                  </div>




                                                  <div class="row clearfix">
                                                    <div class="col-md-12">
                                                      <div class="form-group form-group-default ">
                                                        <label>Link Grabación</label>
                                                        {!! Form::text('recording', $course->recording, ['class' => 'form-control' . ($errors->has('recording') ? ' is-invalid' : '')]) !!}
                                                        @if ($errors->has('recording'))
                                                          <span class="invalid-feedback">{{ $errors->first('recording') }}</span>
                                                        @endif
                                                      </div>
                                                    </div>
                                                  </div>





                                                  <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="form-group form-group-default input-group required">
                                                        <div class="form-input-group">
                                                          <label>Imagen Conferencia</label>
                                                          @if($url!="")
                                                                  <label class="form-images "  id="labelImagen" for="thumbnail">
                                                                      <input type="file" id="thumbnail"  name="thumbnail" style="display:none">
                                                                      {{$url}}
                                                                  </label>
                                                          @else
                                                          <div class="form-input-group btn-input">
                                                                    <label class="form-images "  id="labelImagen" for="thumbnail">
                                                                        <input type="file" id="thumbnail"  name="thumbnail" style="display:none">
                                                                        Añadir Imagen
                                                                    </label>
                                                                </div>
                                                          @endif
                                                          @if ($errors->has('thumbnail'))
                                                              <span class="invalid-feedback">{{ $errors->first('thumbnail') }}</span>
                                                          @endif
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>


                                                  <div class="card card-default">
                                                    <div class="card-header ">
                                                      <div class="card-title">Descripcion
                                                      </div>
                                                    </div>
                                                    <div class="card-body no-scroll card-toolbar">
                                                      <div class="summernote-wrapper">

                                                                <textarea name="description" id="description" class="summernote">{{$course->description}}</textarea>
                                                      </div>
                                                    </div>
                                                  </div>
                        </div>



                        <br>
                        {!! Form::submit(__('Editar'), ['class' => 'btn btn-info']) !!}

                        {!! Form::submit(__('Limpiar'), ['class' => 'btn btn-default']) !!}

                      {!! Form::close() !!}

                    </div>
                  </div>
                </div>

              </div>
            </div>
           </div>

      </div>

@endsection

