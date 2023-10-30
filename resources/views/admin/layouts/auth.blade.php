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
    @stack('css')
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('') }}images/logo.png" height="36" alt="">
                </a>
            </div>
            @yield('content')
        </div>
    </div>
    <!-- Js Core -->
    <script src="{{ asset('') }}templates/admin/assets/js/tabler.min.js" defer></script>

    <!-- Libs JS -->
    @stack('js')
</body>

</html>
