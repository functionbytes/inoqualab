<!DOCTYPE html>

<html>

<head>

    <title>{{ $settings->label }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <link href="{{ asset('/pages/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/themes.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/magnific-popup.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/progressbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/meanmenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/master.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/select2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/slick.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/pages/css/all.css') }}" rel="stylesheet" type="text/css">

    <script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"5615dcd6767478d64643f5d722a669e7"})});</script>
    
    <script>
        (function(d,t) {
            var BASE_URL="https://chatwoot.inoqualab.com";
            var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=BASE_URL+"/packs/js/sdk.js";
            g.defer = true;
            g.async = true;
            s.parentNode.insertBefore(g,s);
            g.onload=function(){
                window.chatwootSDK.run({
                    websiteToken: 'm8qw9zmDqcSePn7i9n5fDPs8',
                    baseUrl: BASE_URL
                })
            }
        })(document,"script");
    </script>



    {{ Html::favicon('/pages/images/favicon.ico') }}

    @yield('head')

    @stack('css')


</head>

<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MSR5R9N"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

@include ('pages.includes.header')

<main>

    @yield('content')

</main>

@include ('pages.includes.footer')

<script src="{{ asset('/pages/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/swiper-bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/counter.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/typed.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/vanilla-tilt.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/progressbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/TweenMax.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/ScrollMagic.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/animation.gsap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/debug.addIndicators.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/hc-sticky.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/pages/js/scripts.js') }}" type="text/javascript"></script>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')

</body>

</html>

