@extends('layouts.app')
@push('title') BTS List @endpush

@section('main-content')
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        BTS List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <form action="{{ route('bts.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input name="import_bts" type="file"
                                   accept=".xls,.xlsx"
                                   aria-describedby="inputGroupFileAddon04"
                                   class="form-control"
                                   aria-label="Upload" required>

                            <button class="btn btn-outline-pink" type="submit"
                                    id="inputGroupFileAddon04" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-file-import" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3"></path>
                                </svg>
                                Import BTS
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    {{--Message--}}
                    @if( session()->has('success') )
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @elseif( session()->has('error') )
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @endif


                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <form action="" method="GET">
                                            <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control form-control-sm" aria-label="Search invoice">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1">
                                        <input class="form-check-input m-0 align-middle"
                                               type="checkbox" aria-label="Select all invoices">
                                    </th>
                                    <th class="w-1">No.</th>
                                    <th>DD House</th>
                                    <th>BTS Code</th>
                                    <th>Address</th>
                                    <th>Site Type</th>
                                    <th>Division</th>
                                    <th>Thana</th>
                                    <th>Network Mode</th>
                                    <th>Lat|Long</th>
                                    <th>2G On Air Date</th>
                                    <th>3G On Air Date</th>
                                    <th>4G On Air Date</th>
                                    <th>Urban|Rural</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $allBts as $sl => $bts )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
{{--                                        <td>{{ $bts->ddHouse->code }}</td>--}}
                                        <td>{{ $bts->dd_house_id }}</td>
                                        <td data-label="Title">
                                            <div title="BTS Code">{{ $bts->bts_code }}</div>
                                            <div title="Site ID" class="text-muted">{{ $bts->site_id }}</div>
                                        </td>
                                        <td>{{ $bts->address }}</td>
                                        <td>{{ $bts->site_type }}</td>
                                        <td>{{ $bts->division }}</td>
                                        <td data-label="Title">
                                            <div title="Thana">{{ $bts->thana }}</div>
                                            <div title="District" class="text-muted">{{ $bts->district }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div title="Network Mode">{{ $bts->network_mode }}</div>
                                            <div title="Site Status" class="text-muted">{{ $bts->site_status }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div title="Latitude">{{ $bts->latitude }}</div>
                                            <div title="Longitude" class="text-muted">{{ $bts->longitude }}</div>
                                        </td>
{{--                                        <td>{{ \Carbon\Carbon::parse($bts->two_g_on_air_date)->toFormattedDateString() }}</td>--}}
                                        <td>{{ \Carbon\Carbon::parse($bts->two_g_on_air_date)->toFormattedDateString() }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bts->three_g_on_air_date)->toFormattedDateString() }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bts->four_g_on_air_date)->toFormattedDateString() }}</td>
                                        <td>{{ $bts->urban_rural }}</td>
                                        <td>{{ $bts->priority }}</td>
                                        <td>
                                            @switch( $bts->status )
                                                @case(1)
                                                <span class="badge bg-success me-1"></span> Active
                                                @break

                                                @case(0)
                                                <span class="badge bg-danger me-1"></span> Inactive
                                                @break
                                            @endswitch
                                        </td>

                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ route('bts.edit', $bts->id) }}" class="link-primary text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
                                            <a href="#" class="link-danger text-decoration-none"
                                               data-bs-toggle="modal" data-bs-target="#del-bts-{{ $bts->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            </a>
                                        </td>
                                        @include('bts.modals.delete')
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $allBts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( count( $allBts ) > 0 )
                        <div class="mt-3">
                            <a class="btn btn-sm btn-success" href="{{ route('bts.export') }}">Export Excel</a>

                            @if( count( $allBts ) > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_bts">Delete All</button>
                                @include('bts.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
