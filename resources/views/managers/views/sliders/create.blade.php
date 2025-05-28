@extends('layouts.managers')

@section('content')

<div class="content-body">

    <div class="container-fluid">

        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                    
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('manager.partners') }}">Sliders</a></li>
                            <li class="breadcrumb-item "><a href="javascript:void(0)">Crear</a></li>
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



                        {!! Form::open(['route' => ['manager.sliders.store'], 'method' => 'POST', 'id' => 'formSliders' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                
                        {{ csrf_field() }}


                <input type="hidden" id="slack" name="slack" value="">
                <input type="hidden" id="status" name="status" value="false">
                <input type="hidden" id="edit" name="edit" value="true">

                            <div>

                                <div class="form-group-attached">
                                    <div class="row clearfix">
                                        <div class="col-sm-12 clearfix">
                                            <div class="dropzone-container col-md-12 pt-1 pb-2 mb-md-0">

                                                    <div class="dropzone upload-file text-center py-5" id="dropzoneThumbnail">
                        
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

                                    

                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Titulo <span class="required">*</span></label>
                                                <input type="text" name="label" class="form-control" placeholder="Parsley" value=""  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('available', $availables, null  , ['class' => 'full-width select','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">URL <span class="required">*</span></label>
                                                <input type="text" name="url" class="form-control" placeholder="Parsley" value=""  required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Descripción <span class="required">*</span></label>
                                                <input type="text" name="description" id="description"  class="form-control" placeholder="Parsley" value=""  required>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block" >Crear</button>
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
            , url: "{{ url('/manager/sliders/thumbnail') }}"
            , addRemoveLinks: true
            , autoProcessQueue: false
            , uploadMultiple: false
            , acceptedFiles: ".png,.jpg,.jpeg"
            , parallelUploads: 1
            , maxFiles: 1
            , params: {
                _token: token
            },
            // The setting up of the dropzone
            init: function() {

                var myThumbnail = this;

                myThumbnail.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                });

                //dz-started
                //Gets triggered when we submit the image.
                myThumbnail.on('sending', function(file, xhr, formData) {
                    //fetch the user id from hidden input field and send that userid with our image
                    let slider = document.getElementById('slack').value;
                    formData.append('slider', slider);


                });

                myThumbnail.on("addedfile", function(file) {
                    $('#dropzoneThumbnail').addClass('dz-started');
                    $("#status").val('false');
                });

                myThumbnail.on("removedfile", function(files) {

                    $("#status").val('false');
                    item = files.name;

                    if (item.length > 30) {
                        $.ajax({
                            type: 'GET'
                            , url: '/manager/sliders/delete/thumbnail/' + item
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
                    location.href = "/manager/sliders";
                });

                myThumbnail.on("queuecomplete", function() {
                    $("#status").val('true')
                });

                myThumbnail.on("complete", function() {
                    $("#status").val('true');
                    //uploadThumbnail();
                });

            }
        });

        $('#submit').on('click', function(event) {

            event.preventDefault();
            upload = false;
            URL = $("#formSliders").attr('action');
            formData = $('#formSliders').serialize();

            $.ajax({
                type: 'POST'
                , url: URL
                , data: formData
                , success: function(result) {
                  
                        var statuThumbnail = $("#status").val();
                        $("#slack").val(result);

                        myThumbnail.processQueue();
                        uploadThumbnail();
                    //
                }
            });


        });

        function uploadThumbnail() {

            var statuThumbnail = $("#status").val();
            var statuEdit = $("#edit").val();

            if (statuThumbnail == 'true' && statuEdit == 'true') {
                location.href = "/manager/sliders";
            }

        }


    });

</script>


@endpush

