@extends('layouts.managers')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex mr-auto mb-sm-0 mb-2 align-items-center">
                                    <img src="/managers/images/contacts/example.png" alt="" width="60" class="rounded-circle mr-3">
                                    <div>
                                        <h5 class="fs-18 text-black font-w600">{{ $petition->number }}</h5>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="text-primary" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="8" height="8" viewbox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4" cy="4" r="4" fill="#43DC80"></circle>
                                                </svg>
                                                {{ $petition->status->title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card  message-bx chat-box">


                            <div class="card-header">
                                <div><h5 class="text-black font-w500 mb-sm-1 mb-0 title-nm"></h5></div>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown ml-2">
                                        <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div id="listMassages">
                                @include ('managers.partials.sections.tracings')
                            </div>

                            <form  id="formMassage" enctype="multipart/form-data"  role="form" onSubmit="return false">

                                <input name="petition" type="hidden" value="{{ $petition->slack }}">


                                <div class="card-footer border-0 type-massage">

                                    <div class="input-group">
                                        <textarea class="form-control" name="observation" id="observation" placeholder="Escribir mensaje..."></textarea>
                                        <div class="input-group-append">
                                            <a href="javascript:void(0);" class="btn mr-1 btn-paperclip px-3" data-toggle="modal" data-target="#cameraModal" ><i class="las la-paperclip scale5 text-secondary"></i> </a>
                                            <button type="button" class="btn btn-primary rounded text-white addMassage">Enviar</button>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="cameraModal" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Subir archivo</font></font></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" name="document" id="document" class="custom-file-input text-left">
                                                            <label class="custom-file-label">Elija el archivo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')

    <script>

            $(".addMassage").click(function() {

                var $form = $('#formMassage');
                var formData = new FormData($form[0]);

                $.ajax({
                        url: "/manager/petitions/tracing/store",
                        headers: {
                            'X-CSRF-slack': $('meta[name="csrf-slack"]').attr('content')
                        },
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData ,
                        success: function(data) {
                            $("#listMassages").empty().html(data);
                            clearMassage();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            if (jqXHR.status == 500) {
                                alert('Internal error: ' + jqXHR.responseText);
                            } else {
                                alert('Unexpected error.');
                            }
                        }
                });


            });

            $("#observation").keypress(function(e) {

                    if(e.which == 13) {

                        var $form = $('#formMassage');
                        var formData = new FormData($form[0]);

                        $.ajax({
                                url: "/manager/petitions/tracing/store",
                                headers: {
                                    'X-CSRF-slack': $('meta[name="csrf-slack"]').attr('content')
                                },
                                type: "POST",
                                contentType: false,
                                processData: false,
                                data: formData ,
                                success: function(data) {
                                    $("#listMassages").empty().html(data);
                                    clearMassage();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    if (jqXHR.status == 500) {
                                        alert('Internal error: ' + jqXHR.responseText);
                                    } else {
                                        alert('Unexpected error.');
                                    }
                                }
                        });

                    }
            });

            function clearMassage() {
                $("#observation").val("");
                $("#document").val("");
            };

            $("#document").change(function(){
                $("#cameraModal").modal('hide');//ocultamos el modal
            });


    </script>

@endpush

