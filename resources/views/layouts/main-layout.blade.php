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
        <div class="container-fluid">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            {{ $pagePreTitle }}
                        </div>
                        <h2 class="page-title">
                            {{ $pageTitle }}
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <!-- [Full Button]-->
                            {{ $button ?? '' }}

                            <!-- [Icon Button]-->
                            {{ $iconButton ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{ $slot }}

        <x-footer></x-footer>
    </div>
</div>
    <x-footer-scripts></x-footer-scripts>
</body>
</html>
