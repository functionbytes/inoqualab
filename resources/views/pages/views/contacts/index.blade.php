@extends('layouts.pages')


@section('content')

<!-- Contact Area Start -->
<section class="contact__area wow wcfadeUp" data-wow-delay="0.3s">
  <div class="container line">
    <div class="row">
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5">
        <div class="contact__map">
          <iframe src="{{ $settings->maps }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7">
        <div class="contact__content  contacts__container">
          <h2 class="contact__title">Contacto</h2>
          <p>Si tienes dudas o quieres saber más nos podremos en contacto contigo.</p>
          <div class="contact__form  " >
            <form  id="formContacts" class="row" enctype="multipart/form-data"  role="form" onSubmit="return false">

              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                <!-- <label for="name">Name</label> -->
                <input type="text" id="names" name="names"  placeholder="Tu nombre">
              </div>
              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                <!-- <label for="email">Email</label> -->
                <input type="email" id="email"  name="email"  placeholder="Tu correo">
              </div>
              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                <!-- <label for="phone">Phone (Optional)</label> -->
                <input type="text" id="cellphone" name="cellphone" placeholder="Tu número">
              </div>
              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 form-container">
                <!-- <label for="phone">Phone (Optional)</label> -->
                <input type="text" id="subject" name="subject" placeholder="Asunto">
              </div>
             
              <div class="col-xxl-12">
                <!-- <label for="message">Message</label> -->
                <textarea name="message" id="message" placeholder="Tu mensaje aquí"></textarea>
            </div>
              
              <div class="form-group">
                <div class="form-check checkbox">
                    <input name="terms"  class="form-check-input" type="checkbox" id="terms" required="">
                    <label class="form-check-label" for="terms">
                        Acepto los <a class="link style1" href="{{ route('terms') }}">terminos y condiciones</a> para el tratamiento de mis datos personales
                    </label>
                </div>
            </div>

              <div class="col-xxl-12 mt-3">
                <button id="addContacts" class="submit wc-btn-primary btn-hover contact-disabled wc-btn-form submit-contacts" type="submit"><span></span> ENVIAR</button>
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



            $("#terms").on("change", function() {

              value = $(this).is(":checked");

                  if (value == true) {
                      $('#addContacts').removeClass("contact-disabled");
                  } else {
                      $('#addContacts').addClass("contact-disabled");
                  }

          });
            $("#submitContacts").click(function() {
                $("#formContacts").submit();
            });


            $("#formContacts").validate({
                submit: false,
                ignore: ":hidden:not(#note),.note-editable.panel-body",
                rules: {
                    names: {
                        validationTxt: true,
                        required: true,
                        minlength: 3,
                        maxlength: 30
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
                    subject: {
                       required: true,
                       minlength: 3,
                       maxlength: 300,
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
                    cellphone: {
                        required: "La celular es necesario",
                        minlength: "La celular debe contener al menos 6 caracteres",
                        maxlength: "La celular debe contener no mas de 20 caracteres",
                        number: "Sólo se pueden ingresar números"
                    },
                    subject: {
                        required: 'Este campo es obligatorio.',
                        minlength: 'El nombre debe contener al menos 3 caracteres.',
                        maxlength: 'El nombre  debe contener no mas de 300 caracteres',
                    },
                    email: {
                        required: "El email es necesario",
                        email: "Por favor ingrese email valido"
                    },
                    message: {
                      required: 'Este campo es obligatorio.',
                      minlength: 'El nombre debe contener al menos 3 caracteres.',
                      maxlength: 'El nombre  debe contener no mas de 800 caracteres',
                    }
                },
                submitHandler: function(form) {

                  var $form = $('#formContacts');
                    var formData = new FormData($form[0]);

                    $.ajax({
                        url: "/contacts/store",
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
                                    $("#email").val('');
                                    $("#cellphone").val('');
                                    $("#subject").val('');
                                    $("#message").val('');
                                    

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

