<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <!-- Title -->
    <title>@stack('title') | {{ config('app.name') }}</title>

<!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logo/site-icon.ico') }}">

    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet"/>

    <style>
        input[type="date"] {
            position: relative;
        }

        /* create a new arrow, because we are going to mess up the native one
        see "List of symbols" below if you want another, you could also try to add a font-awesome icon.. */
        input[type="date"]:after {
            content: "";
            color: #555;
            padding: 0 5px;
        }

        /* change color of symbol on hover */
        input[type="date"]:hover:after {
            color: #bf1400;
        }

        /* make the native arrow invisible and stretch it over the whole field so you can click anywhere in the input field to trigger the native datepicker*/
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: auto;
            height: auto;
            color: transparent;
            background: transparent;
        }

        /* adjust increase/decrease button */
        input[type="date"]::-webkit-inner-spin-button {
            z-index: 1;
        }

        /* adjust clear button */
        input[type="date"]::-webkit-clear-button {
            z-index: 1;
        }
    </style>
    @livewireStyles
</head>
<body >
<div class="wrapper">

    <div class="sticky-top">
        @include('layouts.partials.topbar')
        @include('layouts.partials.navigation')
    </div>

    <div class="page-wrapper">

        @yield('main-content')

        @include('layouts.partials.footer')
    </div>
</div>

<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.min.js') }}"></script>

<!-- Sweetalert -->
@include('sweetalert::alert')

<!-- Custom Scripts -->
@stack('js')

<!-- Livewire Scripts -->
@livewireScripts
</body>
</html>