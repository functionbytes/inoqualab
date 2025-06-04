<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('meta_title') }}</title>
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
    <meta name="image" content="{{ getMeta() }}" />
    <meta name="robots" content="index,follow">
    <meta name="rating" content="RTA-5042-1996-1400-1577-RTA" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ setting('meta_title') }}">
    <meta name="twitter:description" content="{{ setting('meta_description') }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ getMeta() }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ setting('meta_title') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{  url()->current() }}" />
    <meta property="og:image" content="{{ getMeta() }}" />
    <meta property="og:description" content="{{ setting('meta_description') }}" />
    <meta property="og:site_name" content="{{ setting('meta_title') }}" />


    {!! SEOMeta::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! JsonLdMulti::generate() !!}
    {!! SEO::generate() !!}
    {!! SEO::generate(true) !!}

    {!! app('seotools')->generate() !!}

    @yield('head')


    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/pages/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/menu.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/css/dropdown-effects/fade-down.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/lunar.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/skyblue-theme.css') }}">
    <link rel="stylesheet" href="{{ url('/pages/css/responsive.css') }}">


</head>

@stack('css')


</head>

<body class="" >

<div class="wsmenucontainer">
    <div id="page" class="page font--jakarta">

        @include ('pages.includes.header')

        @yield('content')

        @include ('pages.includes.footer')

        @include ('pages.includes.socials')


    </div>
</div>

<script src="{{ url('/pages/js/jquery-3.7.0.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/bootstrap.min.js') }}" type="text/javascript">
    <script src="{{ url('/pages/js/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/jquery.easing.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/jquery.appear.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/menu.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/pricing-toggle.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/request-form.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/jquery.ajaxchimp.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/lunar.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/wow.js') }}" type="text/javascript"></script>
<script src="{{ url('/pages/js/custom.js') }}" type="text/javascript"></script>

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>

<script>
    function initialize() {
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
    }
    google.maps.event.addDomListener(window, "load", initialize);
</script>


@if(setting('google_analytics_enable') == 'true' )
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-XXXXXXXXXX');
    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '{{ setting('google_analytics') }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif

@if(setting('fb_pixel_enable') == 'true' )

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{setting('fb_pixel_enable')}}');
        fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id={{setting('fb_pixel_enable')}}&ev=PageView&noscript=1"
        /></noscript>
@endif

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
