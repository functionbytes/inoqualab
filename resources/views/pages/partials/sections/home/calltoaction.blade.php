<section class="bg-single-image-02 bg-accent py-lg-13 py-11 wow wcfadeUp" data-wow-delay="0.3s" data-animated-id="12">
    <div class="container">
        <div class="row">
            <div class="col-md-6  col-sm-12 fadeInLeft animated" data-animate="fadeInLeft">
                <div class="pl-6 border-4x border-left border-primary">
                    <h2 class="text-heading lh-15 fs-md-32 fs-25">Para más información sobre nuestros servicios,<span class="text-primary"> ponerse en contacto</span> con nuestros asesores</h2>
                </div>
            </div>
            <div class="col-md-6   col-sm-12 text-center mt-sm-0 mt-8 fadeInRight animated" data-animate="fadeInRight">
                <i class="fal fa-phone fs-40 text-primary"></i>
                <p class="fs-13 font-weight-500 letter-spacing-173 text-uppercase lh-2 mt-3">¡Llama ahora!</p>
                <p class="application fs-md-42 fs-32 font-weight-600 text-secondary lh-1"><a href="tel:+{{ $settings->cellphone }}">+{{ $settings->cellphone }}</a></p>
                <a href="{{ route('applications') }}" class="btn btn-lg btn-primary mt-2 px-10">COTIZA AQUÍ </a>
            </div>
        </div>
    </div>
</section>
