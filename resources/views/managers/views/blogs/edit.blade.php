@extends('layouts.managers')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                    
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('manager.blogs') }}">Blogs</a></li>
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

                {!! Form::open(['route' => ['manager.blogs.update' , $blog->slack], 'method' => 'POST', 'id' => 'formBlogs' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                
                {{ csrf_field() }}


                                        <input type="hidden" id="id" name="id" value="{{ $blog->id }}">
                                        <input type="hidden" id="slack" name="slack" value="{{ $blog->slack }}">
                                        <input type="hidden" id="status" name="status" value="true">
                                        <input type="hidden" id="edit" name="edit" value="true"> 

                                        <textarea style="display: none"  id="text-contents" name="content">{!! $blog->content !!}</textarea>
                                        <textarea style="display: none"  id="text-descriptions" name="description">{!! $blog->description !!}</textarea>

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

                                    <div class="form-group-attached">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nombre <span class="required">*</span></label>
                                                <input type="text" name="label" class="form-control" placeholder="Parsley" value="{{ $blog->label }}"  required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Fecha <span class="required">*</span></label>
                                                <input type="date" name="date" value="{{ $blog->date_at}}" class="form-control" id="date" placeholder="" required>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('available', $availables, $blog->available , ['class' => 'full-width select','type' => 'text' ,'name' => 'available' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Categoria <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('categorie', $categories, $blog->categorie_id , ['class' => 'full-width select','type' => 'text' ,'name' => 'categorie' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Tags <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                    {!! Form::select('tags[]', $tags, $blog->tags, ['class' => 'full-width select' , 'data-init-plugin' => 'select2' , 'multiple' => 'multiple']) !!}
                         
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Descripcion <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="description">{!! $blog->description !!}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Descripcion <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="content">{!! $blog->content !!}</div>
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



		var content = new Quill('#content', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Escriba aquí...',
			theme: 'snow'
		});

		//Avoid Quick Search Toggle
		content.on('selection-change', function (range, oldRange, source) {
			if (range === null && oldRange !== null) {
				$('body').removeClass('overlay-disabled');
			} else if (range !== null && oldRange === null) {
				$('body').addClass('overlay-disabled');
			}
		});

    content.on('text-change', function(delta, oldDelta, source) {
        $('#text-contents').val(content.container.firstChild.innerHTML);
    });


  </script>

@endpush


