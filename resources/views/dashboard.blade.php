@php

    if ( auth()->user()->role == 'rso' )
    {
        //$id = \App\Models\Rso::firstWhere('user_id', auth()->id())->id;
        //$lso = \App\Models\Retailer::where('rso_id', $id)->get();
        //$sso = \App\Models\Retailer::where('rso_id', $id)->where('sim_seller', 'Y')->get();
    }elseif( auth()->user()->role == 'super-admin' ){
        //$lso = \App\Models\Retailer::all();
        //$sso = \App\Models\Retailer::where('sim_seller', 'Y')->get();
    }

@endphp

<x-main>

    <!-- Main Title -->
    <x-slot:title>Dashboard</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Dashboard</x-slot:page-title>
{{--    <hr>--}}

    <div class="page-body">
        <div class="container-fluid">
            <div class="row row-deck row-cards mb-4">
                <!-- LSO/SSO -->
                @if( isset( $lso ) && isset( $sso ) )
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">lso</div>
                                <div class="ms-auto lh-1">
                                    <a class="text-muted" href="{{ route('retailer.index') }}">Retailer List</a>
                                </div>
                            </div>
                            <div class="h1 mb-3">{{ count( $lso ) }}</div>
                            <div class="subheader">sso</div>
                            <div class="h1">{{ count( $sso ) }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Itop Replace -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h3 class="m-0">Itop Replace</h3>
                    <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">Total</th>
                            <th scope="col">Pending</th>
                            <th scope="col">Processing</th>
                            <th scope="col">Completed</th>
                            <th scope="col">Paid</th>
                            <th scope="col">Due</th>
                            <th scope="col">Unapproved</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>
                                <!-- Total Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Pending Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('status','pending')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('status','pending')->count() }}
                                @endif
                            </td>
                            <td>
                                <!-- Processing Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('status','processing')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('status','processing')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Completed Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('status','complete')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('status','complete')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Paid Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('status','paid')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('status','paid')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Due Itop Replace -->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('status','due')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('status','due')->count()}}
                                @endif
                            </td>
                            <td>
                                <!-- Unapproved-->
                                @if( auth()->user()->role == 'super-admin' )
                                    {{ $replace->where('remarks','Unapproved')->count()}}
                                @else
                                    {{ $replace->where('user_id', auth()->id())->where('remarks','Unapproved')->count()}}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
