@extends('layouts.app')
@push('title') All House's @endpush

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
                        All House's
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- Create new house [Full Button]-->
                        <a href="{{ route('dd-house.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Create new house
                        </a>

                        <!-- Create new house [Icon Button]-->
                        <a href="{{ route('dd-house.create') }}" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </a>
                    </div>
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
                                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                    <th class="w-1">No.</th>
                                    <th>Cluster|Region</th>
                                    <th>Email</th>
                                    <th>DD Name</th>
                                    <th>Proprietor Name</th>
                                    <th>Lat|Long</th>
                                    <th>BTS Code</th>
                                    <th>Established Year</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $dds as $sl => $dd )
                                <tr>
                                    <td>
                                        <input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Select invoice">
                                    </td>
                                    <td><span class="text-muted">{{ ++$sl }}</span></td>
                                    <td data-label="Title">
                                        <div>{{ $dd->cluster_name }}</div>
                                        <div class="text-muted">{{ $dd->region }}</div>
                                    </td>
                                    <td>{{ $dd->email }}</td>
                                    <td data-label="Title">
                                        <div>{{ $dd->name }}</div>
                                        <div class="text-muted">{{ $dd->code }}</div>
                                    </td>
                                    <td data-label="Title">
                                        <div>{{ $dd->proprietor_name }}</div>
                                        <div class="text-muted">{{ $dd->proprietor_number }}</div>
                                    </td>
                                    <td data-label="Title">
                                        <div>{{ $dd->latitude }}</div>
                                        <div class="text-muted">{{ $dd->longitude }}</div>
                                    </td>
                                    <td>{{ $dd->bts_code }}</td>
                                    <td>{{ $dd->established_year }}</td>
                                    <td>
                                        @switch( $dd->status )
                                            @case( 1 )
                                            <span class="badge bg-success me-1"></span> Active
                                            @break

                                            @case( 0 )
                                            <span class="badge bg-danger me-1"></span> Inactive
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <!-- Edit -->
                                        <a href="{{ route('dd-house.edit', $dd->id) }}" class="link-primary text-decoration-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                        </a>

                                        <!-- Delete -->
                                        <a href="#" class="link-danger text-decoration-none"
                                           data-bs-toggle="modal" data-bs-target="#del-house-{{ $dd->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        </a>
                                    </td>
                                    @include('dd-house.modals.delete')
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
                            {{ $dds->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
