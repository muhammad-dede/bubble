<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @hasSection('title')
        <title>@yield('title')&nbsp;-&nbsp;{{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <meta content="Bubble Wedding Organizer" name="description">
    <meta content="Bubble Wedding Organizer" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('') }}images/logo.png" rel="icon">
    <link href="{{ asset('') }}images/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}templates/web/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('') }}templates/web/css/style.css" rel="stylesheet">
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 70px;
            right: 15px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 40px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }
    </style>
    @stack('css')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('web.layouts.header')
    <!-- End Header -->

    @yield('content')
    <!-- ======= Footer ======= -->
    @include('web.layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
        class="float" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}templates/web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}templates/web/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}templates/web/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('') }}templates/web/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}templates/web/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('') }}templates/web/js/main.js"></script>
    @stack('js')
</body>

</html>
