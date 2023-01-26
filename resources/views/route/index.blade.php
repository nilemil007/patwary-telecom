@extends('layouts.app')
@push('title') <title>Route List | {{ config('app.name') }}</title> @endpush

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
                        Route List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <form action="{{ route('route.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input name="import_routes" type="file"
                                   accept=".xls,.xlsx"
                                   class="form-control"
                                   aria-label="Upload" required>

                            <button class="btn btn-outline-google" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-file-import" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3"></path>
                                </svg>
                                Import Route
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
                    @elseif( session()->has('warning') )
                        <p class="alert alert-warning">{{ session('warning') }}</p>
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
                                            <input type="text" name="search" value="{{ request()->get('search') }}"
                                                   class="form-control form-control-sm">
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
                                    <th>Route Code</th>
                                    <th>Route Name</th>
                                    <th>Description</th>
                                    <th>Week Day</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $routes as $sl => $route )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>

{{--                                        <td>{{ $route->rso->user->ddHouse->code }}</td>--}}
                                        <td>{{ $route->code }}</td>
                                        <td>{{ $route->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($route->description,9) }}</td>
                                        <td>{{ $route->weekdays }}</td>
                                        <td>
                                            @switch( $route->status )
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
                                            <a href="{{ route('route.edit', $route->id) }}"
                                               class="link-primary text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
                                            <a href="#" class="link-danger text-decoration-none"
                                               data-bs-toggle="modal"
                                               data-bs-target="#del-route-{{ $route->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            </a>
                                        </td>
                                        @include('route.modals.delete')
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
                            {{ $routes->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( count( $routes ) > 0 )
                        <div class="mt-3">
                            <a class="btn btn-sm btn-success" href="{{ route('route.export') }}">Export Excel</a>

                            @if( count( $routes ) > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_routes">Delete All</button>
                                @include('route.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
