<x-main>

    <!-- Main Title -->
    <x-slot:title>All Notifications</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>all</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Notifications</x-slot:page-title>

    <!-- Page title action button -->
    @if( auth()->user()->unreadNotifications->count() > 1 )
        <x-slot:button>
            <x-link href="{{ route('markAllAsRead') }}" class="btn btn-primary d-none d-sm-inline-block">
                <x-icon.checks></x-icon.checks>Mark all as read
            </x-link>
        </x-slot:button>

        <x-slot:icon-button>
            <x-link href="{{ route('markAllAsRead') }}" class="btn btn-primary d-sm-none btn-icon">
                <x-icon.checks></x-icon.checks>
            </x-link>
        </x-slot:icon-button>
    @else
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
    @endif

    <div class="page-body">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="divide-y">
                                @forelse( auth()->user()->notifications as $notify )
                                    <div class="{{ $notify->read_at ? 'text-muted' : '' }}">
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
                                                @if( !$notify->read_at )
                                                    <x-link href="{{ route('markAsRead', $notify->id) }}" class="text-decoration-underline">Mark as read</x-link>
                                                @endif
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
                                @empty
                                    <p class="text-muted text-center">No notifications</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
