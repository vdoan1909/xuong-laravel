<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/client/img/favicon.ico') }}">

    <!-- All CSS Files -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/bootstrap.min.css') }}">
    <!-- Icon Font -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/client/css/pe-icon-7-stroke.css') }}">
    <!-- Plugins css file -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/plugins.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('theme/client/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/responsive.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('theme/client/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    <div class="wrapper">
        @include('client.layout.header')

        @yield('content')

        @include('client.layout.footer')
    </div>

    <!-- jQuery latest version -->
    <script src="{{ asset('theme/client/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/client/js/vendor/jquery-migrate.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('theme/client/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('theme/client/js/plugins.js') }}"></script>
    <!-- Ajax Mail js -->
    <script src="{{ asset('theme/client/js/ajax-mail.js') }}"></script>
    <!-- Main js -->
    <script src="{{ asset('theme/client/js/main.js') }}"></script>

</body>

</html>
