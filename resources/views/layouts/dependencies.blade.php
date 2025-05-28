
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}"  >

    <head>
        <meta charset="utf-8">
        <title>{{ $configuration->label }}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="author" content="{{ $configuration->label }}">
        <meta name="website" content="http://pqrs.nevada.com.co/">
        <meta name="Version" content="v3.0.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="images/favicon.ico">

        <link href="{{ asset('managers/vendors/jqvmap/css/jqvmap.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/chartist/css/chartist.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/datatables/css/jquery.dataTables.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/summernote/summernote.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/fullcalendar/css/main.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/jquery-steps/css/jquery.steps.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/css/style.css') }}"  rel="stylesheet">
        @stack('css')

    </head>


    <body data-sidebar-style="mini" >

        @include ('dependencies.includes.header')

        @yield('content')

        @include ('dependencies.includes.footer')


    <!-- Footer Scripts
    ============================================= -->

    <script src="{{ asset('managers/vendors/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/deznav-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/waypoints/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/jquery.counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/apexchart/apexchart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/peity/jquery.peity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/plugins-init/summernote-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/dashboard/analytics.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/vendors/jquery-steps/build/jquery.steps.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/plugins-init/jquery-steps-init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('managers/js/styleSwitcher.js') }}" type="text/javascript"></script>


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

