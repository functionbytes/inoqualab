@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')

    <section class="bg-patten-03 line pb-13 wow wcfadeUp applications__container" data-wow-delay="0.15s" data-animated-id="3">
        <div class="container">

            <div class="row">
                <div class="col-xxl-12">
                    <div class="service__title-wrapper-3">
                        <h2 class="section-sub-title wow wcfadeUp">INOQUALAB</h2>
                        <h3 class="section-title wow wcfadeUp">Formato cotización</h3>
                        <p class="wow wcfadeUp">Te invitamos a diligenciar el siguiente formato para enviarte una cotización formal.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="contact__content ">
                        <div class="contact__form wow wcfadeUp">
                            <form id="formApplications" class="row" enctype="multipart/form-data" role="form"
                                onSubmit="return false">

                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 form-container">
                                    <!-- <label for="email">Email</label> -->
                                    {!! Form::select('service', $services, null, [
                                        'type' => 'text',
                                        'name' => 'service',
                                        'id' => 'service',
                                        'class' => 'select form-controlv service',
                                        'data-init-plugin ' => 'select2',
                                    ]) !!}
                                    <label for="service" class="error none"></label>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                                    <!-- <label for="name">Name</label> -->
                                    <input type="text" id="names" name="names" placeholder="Nombres *">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="text" id="cellphone" name="cellphone" placeholder="Celular *">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="text" id="company" name="company" placeholder="Empresa *">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="text" id="charge" name="charge" placeholder="Cargo *">
                                </div>
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 form-container">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="email" id="email" name="email" placeholder="Correo electronico">
                                </div>

                                <div class="col-xxl-12">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea name="message" id="message" placeholder="Su mensaje aquí"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="form-check checkbox">
                                        <input name="terms" class="form-check-input" type="checkbox" id="terms"
                                            required="">
                                        <label class="form-check-label" for="terms">
                                            Acepto los <a class="link style1" href="{{ route('terms') }}">terminos y
                                                condiciones</a>
                                            para el tratamiento de mis datos personales
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xxl-12 mt-3">
                                    <button id="addApplications"
                                        class="submit wc-btn-primary btn-hover contact-disabled wc-btn-form submit-contacts"
                                        type="submit"><span></span> ENVIAR</button>
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
        $(document).ready(function() {

            jQuery.validator.addMethod("emailExt", function(value, element, param) {
                return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,3}$/);
            }, 'Porfavor ingrese email valido');
 
            jQuery.validator.addMethod(
                'validationTxt',
                function(value, element, param) {
                    return value.match(
                        /^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/,
                    )
                },
                'Por favor ingrese solo letras',
            )



            $("#submitApplications").click(function() {
                $("#formApplications").submit();
            });


            $("#formApplications").validate({
                submit: false,
                ignore: ":hidden:not(#note),.note-editable.panel-body",
                rules: {
                    names: {
                        validationTxt: true,
                        required: true,
                        minlength: 3,
                        maxlength: 30
                    },
                    charge: {
                        validationTxt: true,
                        required: true,
                        minlength: 3,
                        maxlength: 30
                    },
                    company: {
                        required: true,
                        minlength: 3,
                        maxlength: 30
                    },
                    service: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        emailExt: true
                    },
                    cellphone: {
                        required: true,
                        number: true,
                        minlength: 8,
                        maxlength: 500
                    },
                    message: {
                        required: true,
                        minlength: 8,
                        maxlength: 500
                    }
                },
                messages: {
                    names: {
                        text: 'Este campo es obligatorio.',
                        required: 'El campo nombre es necesario.',
                        minlength: 'El nombre debe contener al menos 3 caracteres.',
                        maxlength: 'El nombre  debe contener no mas de 30 caracteres'
                    },
                    charge: {
                        text: 'Este campo es obligatorio.',
                        required: 'El campo nombre es necesario.',
                        minlength: 'El nombre debe contener al menos 3 caracteres.',
                        maxlength: 'El nombre  debe contener no mas de 30 caracteres',
                    },
                    company: {
                        text: 'Este campo es obligatorio.',
                        required: 'El campo nombre es necesario.',
                        minlength: 'El nombre debe contener al menos 3 caracteres.',
                        maxlength: 'El nombre  debe contener no mas de 30 caracteres'
                    },
                    service: {
                        required: "Es necesario seleccionar"
                    },
                    email: {
                        required: "El email es necesario",
                        email: "Por favor ingrese email valido"
                    },
                    cellphone: {
                        required: "La celular es necesario",
                        minlength: "La celular debe contener al menos 6 caracteres",
                        maxlength: "La celular debe contener no mas de 20 caracteres",
                        number: "Sólo se pueden ingresar números"
                    },
                    message: {
                        required: "Este campo es necesario",
                        minlength: 'El nombre debe contener al menos 3 caracteres.',
                        maxlength: 'El nombre  debe contener no mas de 30 caracteres',
                    }
                },
                submitHandler: function(form) {

                    var $form = $('#formApplications');
                    var formData = new FormData($form[0]);

                    $.ajax({
                        url: "/application/store",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {

                            if (data == 'Debes confirmar que no eres un robot') {

                                $("#notification").removeClass("none");
                                $("#recaptcha").text(data);

                            } else {

                                swal("Solicitud enviada", "Nos comunicaremos contigo !!",
                                    "success");

                                $("#names").val('');
                                $("#company").val('');
                                $("#charge").val('');
                                $("#email").val('');
                                $("#cellphone").val('');
                                $("#message").val('');
                                $("#service").val("0").trigger('change');

                            }
                        }
                    });

                }

            });
        });
    </script>

    <script type="text/javascript">
        $("#terms").on("change", function() {

            value = $(this).is(":checked")

            if (value == true) {
                $('#addApplications').removeClass("contact-disabled");
            } else {
                $('#addApplications').addClass("contact-disabled");
            }

        });



        $(".service").select2({
            placeholder: "Selecionar un servicio",
            minimumResultsForSearch: -1
        });
    </script>
@endpush
