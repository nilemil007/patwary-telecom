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
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('others-operator-information.index') }}" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                           <path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44"></path>
                           <path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14"></path>
                           <path d="M12 12v9"></path>
                        </svg>
                      </span>
                            <span class="nav-link-title">
                        Other's Operator Information
                      </span>
                        </a>
                    </li> --}}

                    <!-- Define -->
                    @if( auth()->user()->role == 'super-admin' )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                          <x-icon.target-arrow></x-icon.target-arrow>
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

                    <!-- Services -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon.tool></x-icon.tool>
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

                    <!-- Uploads -->
                    @if( \Illuminate\Support\Facades\Auth::user()->role == 'super-admin' )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                               data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <x-icon.upload></x-icon.upload>
                                </span>
                                <span class="nav-link-title">
                                    Uploads
                                </span>
                            </a>

                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#" onclick="event.preventDefault()" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                Activation
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item justify-content-between"
                                                   href="{{ route('raw.activation') }}">
                                                    <span>Activation</span>
                                                    <span>({{ \App\Models\Activation::all()->count() }})</span>
                                                </a>

                                                <a class="dropdown-item justify-content-between"
                                                   href="{{ route('raw.live.activation') }}">
                                                    <span>Live Activation</span>
                                                    <span>({{ \App\Models\LiveActivation::all()->count() }})</span>
                                                </a>

                                                <a class="dropdown-item justify-content-between"
                                                   href="{{ route('raw.fcd.ga') }}">
                                                    <span>FCD GA</span>
                                                    <span>({{ \App\Models\FcdGa::all()->count() }})</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#" onclick="event.preventDefault()" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                C2C
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('raw.c2c') }}" class="dropdown-item">C2C</a>
                                                <a href="{{ route('raw.live.c2c') }}" class="dropdown-item">Live C2C</a>
                                            </div>
                                        </div>
                                        <a class="dropdown-item" href="{{ route('raw.c2s') }}" >
                                            C2S
                                        </a>
                                        <a class="dropdown-item" href="" >
                                            Sim Issue
                                        </a>
                                        <a class="dropdown-item" href="#" >
                                            Balance
                                        </a>
                                        <a class="dropdown-item" href="#" >
                                            BSO
                                        </a>
                                        <a class="dropdown-item" href="#" >
                                            DSO
                                        </a>
                                    </div>

{{--                                    <div class="dropdown-menu-column">--}}
{{--                                        <a class="dropdown-item" href="./navigation.html" >--}}
{{--                                            Navigation--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./charts.html" >--}}
{{--                                            Charts--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./pagination.html" >--}}
{{--                                            Pagination--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./skeleton.html" >--}}
{{--                                            Skeleton--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./tabs.html" >--}}
{{--                                            Tabs--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./tables.html" >--}}
{{--                                            Tables--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./carousel.html" >--}}
{{--                                            Carousel--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./lists.html" >--}}
{{--                                            Lists--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./typography.html" >--}}
{{--                                            Typography--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./offcanvas.html" >--}}
{{--                                            Offcanvas--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="./markdown.html" >--}}
{{--                                            Markdown--}}
{{--                                        </a>--}}
{{--                                        <div class="dropend">--}}
{{--                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >--}}
{{--                                                Authentication--}}
{{--                                            </a>--}}
{{--                                            <div class="dropdown-menu">--}}
{{--                                                <a href="./sign-in.html" class="dropdown-item">Sign in</a>--}}
{{--                                                <a href="./sign-up.html" class="dropdown-item">Sign up</a>--}}
{{--                                                <a href="./forgot-password.html" class="dropdown-item">Forgot password</a>--}}
{{--                                                <a href="./terms-of-service.html" class="dropdown-item">Terms of service</a>--}}
{{--                                                <a href="./auth-lock.html" class="dropdown-item">Lock screen</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="dropend">--}}
{{--                                            <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >--}}
{{--                                                Error pages--}}
{{--                                            </a>--}}
{{--                                            <div class="dropdown-menu">--}}
{{--                                                <a href="./error-404.html" class="dropdown-item">404 page</a>--}}
{{--                                                <a href="./error-500.html" class="dropdown-item">500 page</a>--}}
{{--                                                <a href="./error-maintenance.html" class="dropdown-item">Maintenance page</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>

{{--                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">--}}
{{--                    <form action="." method="get">--}}
{{--                        <div class="input-icon">--}}
{{--                      <span class="input-icon-addon">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>--}}
{{--                      </span>--}}
{{--                            <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
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
