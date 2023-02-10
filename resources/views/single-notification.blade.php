<x-main>

    <!-- Main Title -->
    <x-slot:title>Single Notification</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pretitle>Single</x-slot:page-pretitle>

    <!-- Page Title -->
    <x-slot:page-title>Notification</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.home></x-icon.home>Dashboard
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-sm-none">
            <x-icon.home></x-icon.home>
        </x-link>

        <a href="{{ route('dd-house.create') }}" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
        </a>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="divide-y">
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar"
                                                  style="background-image: url({{ $notify->data['image'] }})"></span>
                                        </div>
                                        <div class="col">
                                            <div>
                                                <strong>{{ strtoupper( $notify->data['role'] ) }} - {{ $notify->data['name'] }}</strong>
                                                from
                                                <strong>{{ $notify->data['dd_house'] }}</strong>
                                                {{ $notify->data['msg'] }}
                                                <span>Modified itop number is <strong><em>{{ $notify->data['tmp_itop_number'] }}</em></strong></span>
                                            </div>
                                            <div class="text-muted d-flex justify-content-between align-items-center">
                                                <span>{{ $notify->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            @if( !$notify->read_at )
                                                <div class="badge bg-danger"></div>
                                            @else
                                                <x-icon.checks class="text-success"></x-icon.checks>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
