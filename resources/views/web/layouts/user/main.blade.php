<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @hasSection('title')
        <title>@yield('title')&nbsp;-&nbsp;{{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="icon" type="image/x-icon" href="{{ asset('') }}images/logo.png" />

    <!-- CSS files -->
    <link href="{{ asset('') }}templates/admin/assets/css/tabler.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}templates/admin/assets/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}templates/admin/assets/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}templates/admin/assets/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}templates/admin/assets/css/demo.min.css" rel="stylesheet" />
    <!-- Libs CSS -->

    <!-- Vendor CSS -->
    <link href="{{ asset('') }}templates/admin/assets/vendors/dataTables/dataTables.bootstrap5.min.css"
        rel="stylesheet">
    <link href="{{ asset('') }}templates/admin/assets/vendors/select2/select2.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/admin/assets/vendors/select2/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">
    <link href="{{ asset('') }}templates/admin/assets/vendors/toastr/build/toastr.min.css" rel="stylesheet">
    <link href="{{ asset('') }}templates/admin/assets/vendors/sweetalert2/dist/sweetalert2.min.css"
        rel="stylesheet">
    @stack('css')
</head>

<body>
    <div class="page">
        @include('web.layouts.user.header')
        <div class="page-wrapper">
            @yield('content')
            @include('web.layouts.user.footer')
        </div>
    </div>

    <!-- Js Core -->
    <script src="{{ asset('') }}templates/admin/assets/js/tabler.min.js" defer></script>
    <!-- Libs JS -->

    <!-- Vendor JS -->
    <script src="{{ asset('') }}templates/admin/assets/vendors/jquery/jquery-3.5.1.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/dataTables/jquery.dataTables.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/dataTables/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/select2/select2.full.min.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/toastr/build/toastr.min.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('') }}templates/admin/assets/vendors/ckeditor5/ckeditor.js"></script>

    @if (Session::has('success'))
        <script>
            toastr["success"]("{{ Session::get('success') }}")
        </script>
    @endif

    @stack('js')
</body>

</html>
