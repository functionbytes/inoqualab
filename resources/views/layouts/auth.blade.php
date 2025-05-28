
<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}"  class="h-100">

    <head>
        <meta charset="utf-8">
        <title>{{ $settings->label }}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="author" content="{{ $settings->label }}">
        <meta name="website" content="http://pqrs.nevada.com.co/">
        <meta name="Version" content="v3.0.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="images/favicon.ico">

        <link href="{{ asset('managers/vendors/jqvmap/css/jqvmap.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/chartist/css/chartist.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/css/style.css') }}"  rel="stylesheet">
        <link href="{{ asset('managers/cdn.lineicons.com/2.0/LineIcons.css') }}"  rel="stylesheet">

        @stack('css')

    </head>

    <body class="h-100">

        @yield('content')


        <script src="{{ asset('managers/vendors/global/global.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/js/custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/js/deznav-init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/waypoints/jquery.waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/jquery.counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/apexchart/apexchart.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/vendors/peity/jquery.peity.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('managers/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>

        @stack('scripts')

    </body>

</html>

