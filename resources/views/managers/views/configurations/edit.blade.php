@extends('layouts.managers')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                    
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item "><a href="javascript:void(0)">Configuracion</a></li>
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

                {!! Form::open(['route' => ['manager.configurations.update' , $configuration->slack], 'method' => 'POST', 'id' => 'formBlogs' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                
                {{ csrf_field() }}

                               <textarea style="display: none"  id="text-descriptions" name="description">{!! $configuration->description !!}</textarea>
                               <textarea style="display: none"  id="text-politics" name="politics">{!! $configuration->politics !!}</textarea>
                               <textarea style="display: none"  id="text-terms" name="terms">{!! $configuration->terms !!}</textarea>




                                    <div class="form-group-attached">
                                    <div class="row">

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Titulo <span class="required">*</span></label>
                                                <input type="text" name="label" class="form-control" placeholder="Parsley" value="{{ $configuration->label }}"  >
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Correo <span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Parsley" value="{{ $configuration->email }}"  >
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-2">
                                          <div class="form-group">
                                              <label class="text-label">Direccion<span class="required">*</span></label>
                                              <input type="text" name="address" class="form-control" placeholder="Parsley" value="{{ $configuration->address }}"  >
                                          </div>
                                      </div>

                                      
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Celular <span class="required">*</span></label>
                                                <input type="text" name="cellphone" class="form-control" placeholder="Parsley" value="{{ $configuration->cellphone }}"  >
                                            </div>
                                        </div>


                                        <div class="col-lg-6 mb-2">
                                          <div class="form-group">
                                              <label class="text-label">Celular Opcional<span class="required">*</span></label>
                                              <input type="text" name="optional" class="form-control" placeholder="Parsley" value="{{ $configuration->optional }}"  >
                                          </div>
                                      </div>

                                      <div class="col-lg-6 mb-2">
                                          <div class="form-group">
                                              <label class="text-label">Telefono Opcional<span class="required">*</span></label>
                                              <input type="text" name="phone" class="form-control" placeholder="Parsley" value="{{ $configuration->phone }}"  >
                                          </div>
                                      </div>


                                      <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Extension<span class="required">*</span></label>
                                            <input type="text" name="ext" class="form-control" placeholder="Parsley" value="{{ $configuration->phone }}"  >
                                        </div>
                                    </div>


                                      <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Horario Entre semana<span class="required">*</span></label>
                                            <input type="text" name="weekday" class="form-control" placeholder="Parsley" value="{{ $configuration->weekday }}"  >
                                        </div>
                                    </div>



                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Facebook<span class="required">*</span></label>
                                            <input type="text" name="facebook" class="form-control" placeholder="Parsley" value="{{ $configuration->facebook }}"  >
                                        </div>
                                    </div>

                                   <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Instagram<span class="required">*</span></label>
                                            <input type="text" name="instagram" class="form-control" placeholder="Parsley" value="{{ $configuration->instagram }}"  >
                                        </div>
                                    </div>


                                   <div class="col-lg-6 mb-2">
                                      <div class="form-group">
                                            <label class="text-label">Mapa<span class="required">*</span></label>
                                            <input type="text" name="maps" class="form-control" placeholder="Parsley" value="{{ $configuration->maps }}"  >
                                      </div>
                                  </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Resultados <span class="required">*</span></label>
                                            <input type="text" name="url" class="form-control" placeholder="Parsley" value="{{ $configuration->url }}"  >
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Video<span class="required">*</span></label>
                                            <input type="text" name="film" class="form-control" placeholder="Parsley" value="{{ $configuration->film }}"  >
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Instructivo<span class="required">*</span></label>
                                            <input type="text" name="instructive" class="form-control" placeholder="Parsley" value="{{ $configuration->instructive }}"  >
                                        </div>
                                    </div>



                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Descripcion <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="description">{!! $configuration->description !!}</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Terminos y Condiciones <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="term">{!! $configuration->terms !!}</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Politica de tratamiento de datos <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="politic">{!! $configuration->politics !!}</div>
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
            , url: "{{ url('/manager/blogs/thumbnail') }}"
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

                $.getJSON('/manager/blogs/get/thumbnail/' + item, function(data) {
                    $.each(data, function(key, value) {
                        var mockFile = {
                            name: value.file
                            , size: value.size
                            , file: value.file
                        };
                        myThumbnail.options.addedfile.call(myThumbnail, mockFile);
                        myThumbnail.options.thumbnail.call(myThumbnail, mockFile
                            , path + "/blogs/" + value.file);
                        myThumbnail.options.complete.call(myThumbnail, mockFile);
                        myThumbnail.options.success.call(myThumbnail, mockFile);
                    });
                });

                myThumbnail.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                });

                myThumbnail.on('sending', function(file, xhr, formData) {
                    let blog = document.getElementById('slack').value;
                    formData.append('blog', blog);
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
                            , url: '/manager/blogs/delete/thumbnail/' + item
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
            URL = $("#formBlogs").attr('action');
            formData = $('#formBlogs').serialize();

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
                location.href = "/manager/blogs";
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

    // Editor
		// https://quilljs.com/docs/quickstart/
		var toolbarOptions = [
			['bold', 'italic', 'underline', 'strike'],        // toggled buttons
			['blockquote', 'code-block'],

			[{ 'header': 1 }, { 'header': 2 }],               // custom button values
			[{ 'list': 'ordered' }, { 'list': 'bullet' }],
			[{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
			[{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
			[{ 'direction': 'rtl' }],                         // text direction

			[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
			[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

			[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
			[{ 'font': [] }],
			[{ 'align': [] }],

			['clean']                                         // remove formatting button
		];

		var description = new Quill('#description', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Escriba aquí...',
			theme: 'snow'
		});

		//Avoid Quick Search Toggle
		description.on('selection-change', function (range, oldRange, source) {
			if (range === null && oldRange !== null) {
				$('body').removeClass('overlay-disabled');
			} else if (range !== null && oldRange === null) {
				$('body').addClass('overlay-disabled');
			}
		});

    description.on('text-change', function(delta, oldDelta, source) {
        $('#text-descriptions').val(description.container.firstChild.innerHTML);
    });


		var term = new Quill('#term', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Escriba aquí...',
			theme: 'snow'
		});

		//Avoid Quick Search Toggle
		term.on('selection-change', function (range, oldRange, source) {
			if (range === null && oldRange !== null) {
				$('body').removeClass('overlay-disabled');
			} else if (range !== null && oldRange === null) {
				$('body').addClass('overlay-disabled');
			}
		});

        term.on('text-change', function(delta, oldDelta, source) {
            $('#text-terms').val(term.container.firstChild.innerHTML);
        });


        var politic = new Quill('#politic', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Escriba aquí...',
			theme: 'snow'
		});

		//Avoid Quick Search Toggle
		politic.on('selection-change', function (range, oldRange, source) {
			if (range === null && oldRange !== null) {
				$('body').removeClass('overlay-disabled');
			} else if (range !== null && oldRange === null) {
				$('body').addClass('overlay-disabled');
			}
		});

        politic.on('text-change', function(delta, oldDelta, source) {
            $('#text-politics').val(politic.container.firstChild.innerHTML);
        });



  </script>

@endpush


