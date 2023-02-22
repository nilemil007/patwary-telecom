@php
$logo = auth()->user()->role == 'super-admin' ? asset('dist/img/logo/EN.png') : ( auth()->user()->role == 'rso' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI01' ? asset('dist/img/logo/patwary-telecom.png') : ( auth()->user()->role == 'rso' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI02' ? asset('dist/img/logo/MS-Modina-Store.png') : ( auth()->user()->role == 'rso' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI03' ? asset('dist/img/logo/Sumaya-Enterprise.png') : ( auth()->user()->role == 'bp' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI01' ? asset('dist/img/logo/patwary-telecom.png') : ( auth()->user()->role == 'bp' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI02' ? asset('dist/img/logo/MS-Modina-Store.png') : ( auth()->user()->role == 'bp' && \App\Models\DdHouse::firstWhere('id', auth()->user()->dd_house_id)->code == 'MYMVAI03' ? asset('dist/img/logo/Sumaya-Enterprise.png') : '' ))))));

$role = auth()->user()->role;
$bp = \App\Models\Bp::firstWhere('user_id', auth()->id())->id??'';
$rso = \App\Models\Rso::firstWhere('user_id', auth()->id())->id??'';
@endphp

<header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">

    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('dashboard') }}">
                <img src="{{ $logo }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>

        <div class="navbar-nav flex-row order-md-last">
            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <x-icon.moon></x-icon.moon>
            </a>

            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <x-icon.sun></x-icon.sun>
            </a>
            <div class="nav-item dropdown d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                    <x-icon.bell></x-icon.bell>
                    @if( auth()->user()->unreadNotifications()->count() > 0 )
                        <small class="badge bg-red">
                            {{ auth()->user()->unreadNotifications()->count() > 9 ? '9+' : auth()->user()->unreadNotifications()->count() }}
                        </small>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-notification p-1">
                    @forelse(auth()->user()->unreadNotifications->take(5) as $notify)
                        <x-link href="{{ route('single.notification', $notify->id) }}">
                            <div class="card mb-1">
                                <div class="card-body p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="avatar"
                                                  style="background-image: url({{ asset( $notify->data['image'] ) }})">
                                                <span class="badge bg-red"></span>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <small>
                                                <strong>
                                                    {{ $notify->data['name'] }}
                                                </strong>
                                                {{ \Illuminate\Support\Str::words($notify->data['msg'], 7) }}
                                                <p class="text-muted m-0">{{ $notify->created_at->diffForHumans() }}</p>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-link>
                    @empty
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="m-0">No notifications</p>
                        </div>
                    @endforelse

                        <x-link href="{{ route('all.notifications') }}" class="d-flex justify-content-center p-2">
                            See all notifications
                        </x-link>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset( Auth::user()->image ) }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ auth()->user()->username }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
{{--                    <a href="#" class="dropdown-item">Set status</a>--}}

                    <a href="{{ $role == 'bp' ? route('bp.show', $bp) : ( $role == 'rso' ? route('rso.profile', $rso) : '' ) }}"
                       class="dropdown-item">
                        Profile & account
                    </a>
{{--                    <a href="#" class="dropdown-item">Feedback</a>--}}
                    <div class="dropdown-divider"></div>
                    <x-link href="#" class="dropdown-item">Settings</x-link>
                    <x-link href="{{ route('logout') }}"
                            class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        {{ __('Logout') }}
                    </x-link>
                    <form class="d-none" id="logout" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
