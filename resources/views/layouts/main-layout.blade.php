<!doctype html>
<html lang="en">
<head>
    <x-head></x-head>

    <!-- Title -->
    <title>{{ $title }} | {{ \App\Models\DdHouse::firstWhere('id', \Illuminate\Support\Facades\Auth::user()->dd_house_id)->name ?? config('app.name') }}</title>
</head>
<body >
<div class="wrapper">

    <div class="sticky-top">
        @include('layouts.partials.topbar')
        @include('layouts.partials.navigation')
    </div>

    <div class="page-wrapper">
        {{ $slot }}
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
