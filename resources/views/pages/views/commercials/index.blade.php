@extends('layouts.pages')

@section('title', '¿Necesitas ayuda?')

@section('content')
    <section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">
        <div class="container">

            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title text-center mb-80">

                        <!-- Title -->
                        <h2 class="s-52 w-700">¿Necesitas ayuda? Contáctanos</h2>

                        <!-- Text -->
                        <p class="p-lg">Cuéntanos qué necesitas y nuestro equipo se pondrá en contacto contigo lo antes posible.</p>

                    </div>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10 col-xl-8">
                    <div class="form-holder">
                        <form name="contactform" class="row contact-form" novalidate="novalidate">

                            <!-- Form Select -->
                            <div class="col-md-12 input-subject">
                                <p class="p-lg">¿En qué podemos ayudarte? </p>
                                <span>Selecciona un tema para dirigir tu solicitud al área correspondiente:</span>
                                <select class="form-select subject" aria-label="Selecciona una opción">
                                    <option selected="">Selecciona una opción...</option>
                                    <option>Desarrollo de software</option>
                                    <option>Marketing digital</option>
                                    <option>Email marketing</option>
                                    <option>Automatización</option>
                                    <option>Otro</option>
                                </select>
                            </div>

                            <!-- Contact Form Input -->
                            <div class="col-md-12">
                                <p class="p-lg">Tu nombre:</p>
                                <span>Introduce tu nombre completo</span>
                                <input type="text" name="name" class="form-control name" placeholder="Tu Nombre*">
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">Tu correo electrónico:</p>
                                <span>Asegúrate de ingresar un correo válido para poder contactarte</span>
                                <input type="text" name="email" class="form-control email" placeholder="Correo Electrónico*">
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">Cuéntanos qué necesitas:</p>
                                <span>Describe detalladamente tu requerimiento o consulta</span>
                                <textarea class="form-control message" name="message" rows="6" placeholder="Escribe aquí tu consulta o requerimiento..."></textarea>
                            </div>

                            <!-- Contact Form Button -->
                            <div class="col-md-12 mt-15 form-btn text-right">
                                <button type="submit" class="btn btn--theme hover--theme submit">Enviar Solicitud</button>
                            </div>

                            <div class="contact-form-notice">
                                <p class="p-sm">Nos tomamos tu privacidad en serio. Utilizaremos tu información para responder a tu solicitud.
                                    Puedes darte de baja en cualquier momento. Consulta nuestra <a href="privacy.html">Política de Privacidad</a> para más detalles.</p>
                            </div>

                            <!-- Contact Form Message -->
                            <div class="col-lg-12 contact-form-msg">
                                <span class="loading"></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- END CONTACT FORM -->

        </div> <!-- End container -->
    </section>

@endsection
