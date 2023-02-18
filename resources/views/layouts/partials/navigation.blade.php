<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <x-icon.home></x-icon.home>
                      </span>
                            <span class="nav-link-title">
                        Dashboard
                      </span>
                        </a>
                    </li>

                    <!-- Competition information -->
{{--                    @can('super-admin')--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('competition.index') }}" >--}}
{{--                      <span class="nav-link-icon d-md-none d-lg-inline-block">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>--}}
{{--                      </span>--}}
{{--                            <span class="nav-link-title">--}}
{{--                        Competition Information--}}
{{--                      </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endcan--}}

                    @if( auth()->user()->role == 'super-admin' )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                      </span>
                            <span class="nav-link-title">
                        Define
                      </span>
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <!-- DD House -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('dd-house.index') }}" >
                                        <span>DD House</span>
                                        <span>({{ \App\Models\DdHouse::all()->count() }})</span>
                                    </a>

                                    <!-- Users -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('create-new-user.index') }}" >
                                        <span>Users</span>
                                        <span>({{ \App\Models\User::all()->count() }})</span>
                                    </a>

                                    <!-- Supervisor -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('supervisor.index') }}">
                                        <span>Supervisor</span>
                                        <span>({{ \App\Models\Supervisor::all()->count() }})</span>
                                    </a>

                                    <!-- Rso -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('rso.index') }}">
                                        <span>Rso</span>
                                        <span>({{ \App\Models\Rso::all()->count() }})</span>
                                    </a>

                                    <!-- Bp -->
                                    @php
                                    $bg_warning = \App\Models\Bp::where('status','unapproved')->get()->count() > 0 ? 'bg-danger-lt':'';
                                    @endphp
                                    <x-link class="dropdown-item justify-content-between" :unapproved="$bg_warning" href="{{ route('bp.index') }}">
                                        <span>Bp</span>
                                        <span>({{ \App\Models\Bp::all()->count() }})</span>
                                    </x-link>

                                    <!-- Retailers -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('retailer.index') }}">
                                        <span>Retailers</span>
                                        <span>({{ \App\Models\Retailer::all()->count() }})</span>
                                    </a>

                                    <!-- BTS -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('bts.index') }}">
                                        <span>BTS</span>
                                        <span>({{ \App\Models\Bts::where('status', 1)->count() }})</span>
                                    </a>

                                    <!-- Routes -->
                                    <a class="dropdown-item justify-content-between"
                                       href="{{ route('route.index') }}">
                                        <span>Routes</span>
                                        <span>({{ \App\Models\Route::where('status', 1)->count() }})</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Services
                            </span>
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <!-- First level dropdown menu -->
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                            Itop Replace
                                        </a>
                                        <div class="dropdown-menu">
                                            @if( \Illuminate\Support\Facades\Auth::user()->role == 'super-admin' )
                                            <a href="#" class="dropdown-item disabled">Issue Serial</a>
                                            @endif
                                            <a href="{{ route('itop-replace.index') }}"
                                               class="dropdown-item justify-content-between">
                                                <span>All Replaces</span>
                                                <span>
                                                    @if( \Illuminate\Support\Facades\Auth::user()->role == 'super-admin' )
                                                        ({{ \App\Models\ItopReplace::where('status','pending')->count() }})
                                                    @else
                                                        ({{ \App\Models\ItopReplace::where('user_id', \Illuminate\Support\Facades\Auth::id() )->where('status','pending')->count() }})
                                                    @endif
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <!-- First level dropdown menu End -->
                                </div>
                            </div>
                        </div>
                    </li>

                    @if( \Illuminate\Support\Facades\Auth::user()->role == 'super-admin' )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                               data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                </svg>
                            </span>
                                <span class="nav-link-title">
                                Roles & Permissions
                            </span>
                            </a>

                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="{{ route('permission.index') }}" >
                                            Permissions
                                        </a>
                                        <a class="dropdown-item" href="{{ route('role.index') }}" >
                                            Roles
                                        </a>
                                    </div>
                                    {{--                                <div class="dropdown-menu-column">--}}
                                    {{--                                    <a class="dropdown-item" href="./navigation.html" >--}}
                                    {{--                                        Navigation--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./charts.html" >--}}
                                    {{--                                        Charts--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./pagination.html" >--}}
                                    {{--                                        Pagination--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./skeleton.html" >--}}
                                    {{--                                        Skeleton--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./tabs.html" >--}}
                                    {{--                                        Tabs--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./tables.html" >--}}
                                    {{--                                        Tables--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./carousel.html" >--}}
                                    {{--                                        Carousel--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./lists.html" >--}}
                                    {{--                                        Lists--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./typography.html" >--}}
                                    {{--                                        Typography--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./offcanvas.html" >--}}
                                    {{--                                        Offcanvas--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="./markdown.html" >--}}
                                    {{--                                        Markdown--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <div class="dropend">--}}
                                    {{--                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >--}}
                                    {{--                                            Authentication--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <div class="dropdown-menu">--}}
                                    {{--                                            <a href="./sign-in.html" class="dropdown-item">Sign in</a>--}}
                                    {{--                                            <a href="./sign-up.html" class="dropdown-item">Sign up</a>--}}
                                    {{--                                            <a href="./forgot-password.html" class="dropdown-item">Forgot password</a>--}}
                                    {{--                                            <a href="./terms-of-service.html" class="dropdown-item">Terms of service</a>--}}
                                    {{--                                            <a href="./auth-lock.html" class="dropdown-item">Lock screen</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="dropend">--}}
                                    {{--                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >--}}
                                    {{--                                            Error pages--}}
                                    {{--                                        </a>--}}
                                    {{--                                        <div class="dropdown-menu">--}}
                                    {{--                                            <a href="./error-404.html" class="dropdown-item">404 page</a>--}}
                                    {{--                                            <a href="./error-500.html" class="dropdown-item">500 page</a>--}}
                                    {{--                                            <a href="./error-maintenance.html" class="dropdown-item">Maintenance page</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>

                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="." method="get">
                        <div class="input-icon">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                      </span>
                            <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $bp = \App\Models\Bp::firstWhere( 'user_id', auth()->id() );
        $rso = \App\Models\Rso::firstWhere( 'user_id', auth()->id() );

        $status = auth()->user()->role == 'bp' && $bp->status ? $bp->status :
        ( auth()->user()->role == 'rso' && $rso->status ? $rso->status : '');
    @endphp

    @if( $status )
        <div class="bg-warning text-center text-white">
            <strong>{{  ucfirst( $status ) . ' request' }}</strong>
        </div>
    @endif
</div>
