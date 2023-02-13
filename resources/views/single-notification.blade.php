<x-main>

    <!-- Main Title -->
    <x-slot:title>Single Notification</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Single</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Notification</x-slot:page-title>

    <!-- Page title action button -->
    <x-slot:button>
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
            <x-icon.home></x-icon.home>Dashboard
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <x-link href="{{ route('dashboard') }}" class="btn btn-primary d-sm-none btn-icon">
            <x-icon.home></x-icon.home>
        </x-link>
    </x-slot:icon-button>

    <div class="page-body">
        <div class="container-fluid">
            <div class="d-none d-md-block">
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

            <div class="row d-md-none">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <span class="avatar"
                                          style="background-image: url({{ $notify->data['image'] }})"></span>
                                </div>
                                <div class="col">
                                    <div>
                                        <strong>{{ strtoupper( $notify->data['role'] ) }} - {{ $notify->data['name'] }}</strong>
                                        from
                                        <strong>{{ $notify->data['dd_house'] }}</strong>
                                        {{ $notify->data['msg'] }}
                                    </div>
                                    <div class="text-muted d-flex align-items-center">
                                        <span>{{ $notify->created_at->diffForHumans() }}</span>
                                        &nbsp;
                                        @if( !$notify->read_at )
                                            <span class="badge bg-danger"></span>
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
</x-main>
