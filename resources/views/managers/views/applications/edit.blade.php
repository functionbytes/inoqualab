@extends('layouts.managers')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
                <div class="col-lg-12">
                    
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('manager.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('manager.applications') }}">Cotizaciones</a></li>
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

                {!! Form::open(['route' => ['manager.applications.update' , $application->slack], 'method' => 'POST', 'id' => 'formBlogs' , 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                
                {{ csrf_field() }}

                <input type="hidden" name="slack"  value="{{ $application->slack }}">
                                           

                                    <div class="form-group-attached">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nombre <span class="required">*</span></label>
                                                <input type="text" name="names" class="form-control" placeholder="Parsley" value="{{ $application->names }}"  disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Correo <span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Parsley" value="{{ $application->email }}"  disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Celular <span class="required">*</span></label>
                                                <input type="text" name="cellphone" class="form-control" placeholder="Parsley" value="{{ $application->cellphone }}"  disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Cargo <span class="required">*</span></label>
                                                <input type="text" name="charge" class="form-control" placeholder="Parsley" value="{{ $application->charge }}"  disabled>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Empresa <span class="required">*</span></label>
                                                <input type="text" name="company" class="form-control" placeholder="Parsley" value="{{ $application->company }}"  disabled>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Fecha <span class="required">*</span></label>
                                                <input type="text" name="created" value="{{ $application->created_at }}" class="form-control" id="date" placeholder="" disabled>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Estado <span class="required">*</span></label>
                                                <div class="align-items-center">
                                                        {!! Form::select('reviewed', $availables, $application->reviewed , ['class' => 'full-width select','type' => 'text' ,'name' => 'reviewed' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Servicio <span class="required">*</span></label>
                                                <input type="text" name="subject" class="form-control" placeholder="Parsley" value="{{ $application->service->label }}"  disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Descripcion <span class="required">*</span></label>
                                                <div class="quill-wrapper">
                                                    <div  id="message">{!! $application->message !!}</div>
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

		var message = new Quill('#message', {
			modules: {
				toolbar: toolbarOptions
			},
			placeholder: 'Escriba aquí...',
			theme: 'snow'
		});

        message.enable(false)

        message.on('text-change', function(delta, oldDelta, source) {
        $('#text-messages').val(message.container.firstChild.innerHTML);
    });




  </script>

@endpush


