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



                        {!! Form::open(['route' => ['manager.faqs.store'], 'method' => 'POST', 'id' => 'formFaqs' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                
                        {{ csrf_field() }}



                        <textarea style="display: none"  id="text-descriptions" name="description"></textarea>


                            <div>

                                <div class="form-group-attached">
                                  

                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Titulo <span class="required">*</span></label>
                                                <input type="text" name="label" class="form-control" placeholder="Parsley" value=""  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Posicion <span class="required">*</span></label>
                                                <input type="text" name="position" class="form-control" placeholder="0" value=""  required>
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
                                                <label class="text-label">Descripcion <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="description"> </div>
                                                </div>
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


  </script>



@endpush


