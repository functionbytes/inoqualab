@extends('layouts.managers')

@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                    <div class="col-lg-12">
                        
                        <div class="col-sm-12 p-md-0 justify-description-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('manager.canals') }}">Canales</a></li>
                                <li class="breadcrumb-item "><a href="javascript:void(0)">Editar</a></li>
                            </ol>
                        </div>
                    </div>
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">

                        {!! Form::open(['route' => ['manager.canals.update' , $canal->slack], 'method' => 'POST', 'id' => 'formCanals' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                        
                                {{ csrf_field() }}


                        <input type="hidden" id="id" name="id" value="{{ $canal->id }}">
                        <input type="hidden" id="slack" name="slack" value="{{ $canal->slack }}">
                        <input type="hidden" id="status" name="status" value="true">
                        <input type="hidden" id="edit" name="edit" value="true">
                        <div>

                                        
                                <div class="form-group-attached">
                                    <div class="row clearfix">
                                        <div class="col-sm-12 clearfix">

                                            <div class="dropzone-container col-md-12 pt-1 pb-2 mb-md-0">


                                                @if ($thumbnail != null)
                                                <div class="dropzone upload-file text-center py-5 dz-started" id="dropzoneThumbnail">
                                                    @else
                                                    <div class="dropzone upload-file text-center py-5" id="dropzoneThumbnail">
                                                        @endif

                                                        <div class="dz-default dz-message">
                                                            <button class="btn btn-indigo px-7 mb-2" type="button">
                                                                Buscar Archivo
                                                            </button>

                                                            <p class="text-heading fs-22 lh-15">Arrastra y suelta la imagen o
                                                            </p>

                                                            <input type="file" hidden name="file">
                                                            <p>Las fotos deben estar en formato JPEG o PNG y al menos 1024 x 768</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                            
                                                <div class="form-group">
                                                    <label class="text-label">Agente <span class="required">*</span></label>
                                                    <input type="text" name="agent" class="form-control" placeholder="Parsley" value="{{ $canal->agent }}"  >
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Nombre <span class="required">*</span></label>
                                                    <input type="text" name="label" class="form-control" placeholder="Parsley" value="{{ $canal->label }}"  required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Correo <span class="required">*</span></label>
                                                    <input type="email" name="email" class="form-control" placeholder="Parsley" value="{{ $canal->email }}"  required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Celular <span class="required">*</span></label>
                                                    <input type="text" name="cellphone" class="form-control" placeholder="Parsley" value="{{ $canal->cellphone }}"  required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Telefono <span class="required">*</span></label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Parsley" value="{{ $canal->phone }}"  >
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Extension <span class="required">*</span></label>
                                                    <input type="text" name="ext" class="form-control" placeholder="Parsley" value="{{ $canal->ext }}"  >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Estado <span class="required">*</span></label>
                                                    <div class="align-items-center">
                                                            {!! Form::select('available', $availables, $canal->available , ['class' => 'full-width select','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block" >Editar</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('scripts')

<script type="text/javascript">
        Dropzone.autoDiscover = false;

        $(document).ready(function() {

            // Dropzone.options.rentals = false;
            let token = $('meta[name="csrf-token"]').attr('content');

            var myThumbnail = new Dropzone("div#dropzoneThumbnail", {
                paramName: "file"
                , url: "{{ url('/manager/canals/thumbnail') }}"
                , addRemoveLinks: true
                , autoProcessQueue: false
                , uploadMultiple: false
                , acceptedFiles: ".png,.jpg,.jpeg"
                , parallelUploads: 1
                , maxFiles: 1
                , params: {
                    _token: token
                },
                // The setting up ´f the dropzone
                init: function() {


                    statuThumbnail = false;

                    var myThumbnail = this;

                    item = $("#slack").val();

                    var path = "{{ asset('pages/imgs') }}";

                    $.getJSON('/manager/canals/get/thumbnail/' + item, function(data) {
                        $.each(data, function(key, value) {
                            var mockFile = {
                                name: value.file
                                , size: value.size
                                , file: value.file
                            };
                            myThumbnail.options.addedfile.call(myThumbnail, mockFile);
                            myThumbnail.options.thumbnail.call(myThumbnail, mockFile
                                , path + "/canals/" + value.file);
                            myThumbnail.options.complete.call(myThumbnail, mockFile);
                            myThumbnail.options.success.call(myThumbnail, mockFile);
                        });
                    });

                    myThumbnail.on("maxfilesexceeded", function(file) {
                        this.removeFile(file);
                    });

                    myThumbnail.on('sending', function(file, xhr, formData) {
                        let canal = document.getElementById('slack').value;
                        formData.append('canal', canal);
                    });

                    myThumbnail.on("addedfile", function(file) {
                        $("#status").val('false');
                        $('#dropzoneThumbnail').addClass('dz-started');
                    });

                    myThumbnail.on("removedfile", function(file) {
                        $("#status").val('false');
                        item = file.name;

                        if (item.length > 20) {
                            $.ajax({
                                type: 'GET'
                                , url: '/manager/canals/delete/thumbnail/' + item
                                , success: function(result) {
                                    //$('#dropzoneThumbnail').addClass('dz-started');
                                }
                            });
                        }

                    });

                    myThumbnail.on('resetFiles', function() {
                        $("#status").val('false');
                        myThumbnail.removeAllFiles();
                    });


                    myThumbnail.on("success", function(file, response) {
                        $("#status").val('true');
                    });

                    myThumbnail.on("queuecomplete", function() {
                        $("#status").val('true');
                    });

                    myThumbnail.on("complete", function() {
                        $("#status").val('true');
                        uploadThumbnail();
                    });
                }
            });



            $('#submit').on('click', function(event) {

                event.preventDefault();
                upload = false;
                URL = $("#formCanals").attr('action');
                formData = $('#formCanals').serialize();

                var statuThumbnail = $("#status").val();

                $.ajax({
                    type: 'POST'
                    , url: URL
                    , data: formData
                    , success: function(result) {

                            var statuThumbnail = $("#status").val();
                            $("#slack").val(result);

                            myThumbnail.processQueue();

                            uploadThumbnail();
                    }
                });
            });


            function uploadThumbnail() {

                var statuThumbnail = $("#status").val();
                var statuEdit = $("#edit").val();

                if (statuThumbnail == 'true' && statuEdit == 'true') {
                    location.href = "/manager/canals";
                }

            }

            $('.select').select2({
                placeholder: "Selección"
                , minimumResultsForSearch: -1
            });

        });

    </script>



  <script type="text/javascript">

        $('#contents').change(function(e){
            var fileName = e.target.files[0].name;
            $(".url-contents").text(fileName);
        });

        $('#thumbnail').change(function(e){
        var fileName = e.target.files[0].name;
        $(".url-thumbnail").text(fileName);
        });


  </script>

@endpush


