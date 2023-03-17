<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@stack('title') | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logo/site-icon.ico') }}">

    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>

    @livewireStyles
</head>
<body  class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">

    @yield('login-page')

</div>
<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.min.js') }}"></script>

@livewireScripts
</body>
</html>
