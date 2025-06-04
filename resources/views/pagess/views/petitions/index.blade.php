
            




@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')

<section class="bg-patten-03 line pb-13 wow wcfadeUp" data-wow-delay="0.15s" data-animated-id="3">
    <div class="container">
       
		<div class="row">
			<div class="col-xxl-12">
			  <div class="service__title-wrapper-3">
				<h2 class="section-sub-title wow wcfadeUp"  >PQRSF</h2>
				<h3 class="section-title wow wcfadeUp" >¿Como realizar el tratamiento de PQRSF?</h3>
				<p class="wow wcfadeUp"  >Si presenta alguna petición, queja, reclamo, sugerencia o felicitación, diligencie el siguiente formulario </p>
			  </div>
			</div>
		  </div>
        <div class="row mt-1">
            <div class="col-md-4 mb-6 mb-lg-0">
                <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                    <div class="card-img-top d-flex align-items-end justify-content-center">
                        <span class="text-primary fs-90 lh-1">
							<h1><span class="circle">1</span></h1>
						</span>
                    </div>
                    <div class="card-body px-0 pt-6 pb-0 text-center">
                        <p class="card-text px-2">
                            Para presentar una petición, queja, reclamo, sugerencia o felicitación, puede realizarla a través de la página web, correo electrónico o comunicación telefónica.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-6 mb-lg-0">
                <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                    <div class="card-img-top d-flex align-items-end justify-content-center">
                        <span class="text-primary fs-90 lh-1">
							<h1><span class="circle">2</span></h1>
						</span>
                    </div>
                    <div class="card-body px-0 pt-6 pb-0 text-center">
                        <p class="card-text px-2">
                            INOQUALAB notificará el recibido de la notificación mediante correo electrónico, la cual será direccionada al área de Gestión de Calidad.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-6 mb-lg-0">
                <div class="card shadow-2 px-7 pb-6 pt-4 h-100 border-0">
                    <div class="card-img-top d-flex align-items-end justify-content-center">
                        <span class="text-primary fs-90 lh-1">
							<h1><span class="circle">3</span></h1>
						</span>
                    </div>
                    <div class="card-body px-0 pt-6 text-center pb-0">
                        <p class="card-text px-2">
							INOQUALAB dará respuesta dentro de los cinco (5) días hábiles siguientes de recibido la notificación, a través de correo electrónico informando sobre el avance o cierre del mismo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Contact Area Start -->
<section class="contact__area wow wcfadeUp" data-wow-delay="0.3s">
  <div class="container ">
    <div class="row">
      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
        <div class="contact__content petitions__container">
          <div class="contact__form wow wcfadeUp" >
            <form id="formPetitions" class="row" enctype="multipart/form-data" role="form" onSubmit="return false">
                <div class="col-xxl-6 form-container">
                    <input type="text" id="firstname" name="firstname" placeholder="Nombres">
                </div>
                <div class="col-xxl-6 form-container">
                    <input type="text" id="lastname" name="lastname" placeholder="Apellidos">
                </div>
                <div class="col-xxl-6 form-container">
                    <input type="email" id="email" name="email" placeholder="Correo electrónico">
                </div>
                <div class="col-xxl-6 form-container">
                    <input type="text" id="cellphone" name="cellphone" placeholder="Celular">
                </div>
                <div class="col-xxl-6 form-container">
                    {!! Form::select('dependencie', $dependencies, null, ['id' => 'dependencie', 'class' => 'select form-control dependencie']) !!}
                    
                    <label id="dependencie-error" class="error "  style="display: none" for="dependencie"></label>
                </div>
                <div class="col-xxl-6 form-container">
                    {!! Form::select('type', $types, null, ['id' => 'type', 'class' => 'select form-control type']) !!}
                    <label id="type-error" class="error " style="display: none"  for="type"></label>
                </div>
                <div class="col-xxl-12 form-container">
                    <input type="file" name="documents" id="documents" class="custom-file-input">
                    <label for="documents" class="custom-file-label">Seleccionar archivo</label>
                </div>
                <div class="col-xxl-12">
                    <textarea name="message" id="message" placeholder="Su mensaje aquí"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check checkbox">
                        <input name="terms" class="form-check-input" type="checkbox" id="terms">
                        <label class="form-check-label" for="terms">
                            Acepto los <a class="link style1" href="{{ route('terms') }}">términos y condiciones</a>
                        </label>
                    </div>
                </div>
                <div class="col-xxl-12 mt-3">
                    <button id="addPetitions" class="submit wc-btn-primary btn-hover contact-disabled wc-btn-form submit-contacts" type="submit"><span></span> ENVIAR</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact Area End -->
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // Agregar método de validación personalizado para email
        jQuery.validator.addMethod("emailExt", function (value) {
            return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(value);
        }, 'Por favor ingrese un email válido');

        
        $("#documents").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(".custom-file-label").text(fileName ? fileName : "Seleccionar archivo");
        });

        $("#formPetitions").validate({
                submit: false,
                ignore: ".ignore",
                rules: {
                    firstname: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                    },
                    lastname: {
                        required: true,
                        minlength: 3,
                        maxlength: 100,
                    },
                    email: {
                        required: true,
                        email: true,
                        emailExt: true,
                    },
                    cellphone: {
                        required: true,
                        number: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    dependencie: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    documents: {
                        required: true,
                    },
                    message: {
                        required: true,
                        minlength: 0,
                        maxlength: 10000,
                    },
                    
                },
                messages: {
                    firstname: {
                        required: "El parametro es necesario.",
                        minlength: "Debe contener al menos 3 caracter",
                        maxlength: "Debe contener al menos 100 caracter",
                    },
                    lastname: {
                        required: "El parametro es necesario.",
                        minlength: "Debe contener al menos 3 caracter",
                        maxlength: "Debe contener al menos 100 caracter",
                    },
                    email: {
                        required: 'Tu email ingresar correo electrónico es necesario.',
                        email: 'Por favor, introduce una dirección de correo electrónico válida.',
                    },
                    cellphone: {
                        required: "El celular es necesario",
                        minlength: "El celular debe contener al menos 8 caracteres",
                        maxlength: "El celular no debe exceder los 20 caracteres",
                        number: "Solo se pueden ingresar números"
                    },
                    type: {
                        required: "El parametro es necesario.",
                    },
                    dependencie: {
                        required: "El parametro es necesario.",
                    },
                    documents: {
                        required: "El parametro es necesario.",
                    },
                    message: {
                        required: "El parametro es necesario.",
                        minlength: "Debe contener al menos 0 caracter",
                        maxlength: "Debe contener al menos 10000 caracter",
                    },
                },
                submitHandler: function(form) {

                    var $form = $('#formPetitions');
                    var formData = new FormData($form[0]);
                   
                    var $submitButton = $('button[type="submit"]');
                    $submitButton.prop('disabled', true);

                    $.ajax({
                         url: "{{ route('petition.store') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {

                                if(response.success == true){

                                    swal("Solicitud enviada", "Nos comunicaremos contigo !!", "success");

                                    $form[0].reset();
                                    $("#type, #dependencie").val("0").trigger("change");

                                    $submitButton.prop('disabled', false);

                                }else{

                                    $submitButton.prop('disabled', false);

                                }

                        }

                    });

                }

            });
            
          

            // Habilitar o deshabilitar el botón según términos
            $("#terms").on("change", function () {
                $("#addPetitions").toggleClass("contact-disabled", !$(this).prop("checked"));
            });

            // Inicializar select2 con placeholders
            $(".type").select2({
                placeholder: "Seleccionar un tipo de solicitud",
                minimumResultsForSearch: -1
            });

            $(".dependencie").select2({
                placeholder: "Seleccionar una dependencia",
                minimumResultsForSearch: -1
            });
    });
</script>
@endpush
