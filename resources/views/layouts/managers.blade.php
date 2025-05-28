
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}"  >

    <head>
        <meta charset="utf-8">
        <title>{{ $settings->label }}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="author" content="{{ $settings->label }}">
        <meta name="email" content="{{ $settings->email }}">
        <meta name="website" content="">
        <meta name="Version" content="v3.0.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="images/favicon.ico">

        <link href="{{ asset('/managers/vendor/jqvmap/css/jqvmap.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/vendor/chartist/css/chartist.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/vendor/datatables/css/jquery.dataTables.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/vendor/summernote/summernote.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/vendor/fullcalendar/css/main.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/vendor/jquery-steps/css/jquery.steps.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/css/dropzone.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('/managers/css/select2.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/managers/css/style.css') }}"  rel="stylesheet">

        
        @stack('css')

    </head>

    <body  data-sidebar-style="mini" >

        <div id="main-wrapper" class="">

            @include ('managers.partials.modals.delete')
            
            @include ('managers.includes.header')

            @include ('managers.includes.navs')

            @yield('content')

            @include ('managers.includes.footer')

        <div>

    <!-- Footer Scripts
    ============================================= -->

    <script src="{{ asset('/managers/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/waypoints/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/jquery.counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/apexchart/apexchart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/peity/jquery.peity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/vendor/jquery-steps/build/jquery.steps.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/plugins-init/jquery-steps-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/styleSwitcher.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/dropzone.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/quill.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/deznav-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/dashboard/analytics.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/plugins-init/summernote-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/managers/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
    
    @stack('scripts')


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '', 'auto');
            ga('send', 'pageview');
    </script>


    <script>

        jQuery(function ($) {
            if ($('.countdown').length > 0) {
                $(".countdown").jCounter({
                    date: '26 Mayo 2021 17:00:00',
                    fallback: function () {
                        console.log("count finished!")
                    }
                });
            }
        });
        window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
        ]); ?>


    </script>

    </body>

</html>

