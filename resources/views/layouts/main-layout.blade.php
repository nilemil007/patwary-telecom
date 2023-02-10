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
        <x-topbar></x-topbar>
        <x-navigation></x-navigation>
    </div>

    <div class="page-wrapper">

        {{ $slot }}

        <x-footer></x-footer>
    </div>
</div>
    <x-footer-scripts></x-footer-scripts>
</body>
</html>
