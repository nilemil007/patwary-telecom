@extends('layouts.app')
@push('title') Supervisor @endpush

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
                        Supervisor
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                        <form method="GET">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search"
                                                       value="{{ request()->get('search') }}"
                                                       class="form-control form-control-sm"
                                                       placeholder="Type something...">
                                                <button class="btn btn-sm btn-primary"
                                                        type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                                    </svg>
                                                    Search
                                                </button>
                                            </div>
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
                                    <th>Name</th>
                                    <th>Personal Number</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Address</th>
                                    <th>NID</th>
                                    <th>DOB</th>
                                    <th>Joining Date</th>
                                    <th>Resign Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $supervisors as $sl => $supervisor )
                                    <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                       aria-label="Select invoice">
                                            </td>
                                            <td><span class="text-muted">{{ ++$sl }}</span></td>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2" style="background-image: url({{ $supervisor->user->image }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $supervisor->user->name }}</div>
                                                        <div class="text-muted">
                                                            {{ empty($supervisor->pool_number)?'Not Assigned':$supervisor->pool_number }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ empty($supervisor->personal_number)?'Not Assigned':$supervisor->personal_number }}</td>
                                            <td>{{ $supervisor->father_name }}</td>
                                            <td>{{ $supervisor->mother_name }}</td>
                                            <td>{{ \Illuminate\Support\Str::words($supervisor->address,4) }}</td>
                                            <td>{{ $supervisor->nid }}</td>
                                            <td>{{ !empty($supervisor->dob)?$supervisor->dob->toFormattedDateString():'' }}</td>
                                            <td>{{ !empty($supervisor->joining_date)?$supervisor->joining_date->toDayDateTimeString():'' }}</td>
                                            <td>{{ !empty($supervisor->resigning_date)?$supervisor->resigning_date->toDayDateTimeString():'' }}</td>
                                            <td>
                                                @if(!empty($supervisor->resigning_date))
                                                    <span class="badge bg-danger me-1"></span> Inactive
                                                @else
                                                    <span class="badge bg-success me-1"></span> Active
                                                @endif
                                            </td>

                                            <td>
                                                <!-- Edit -->
                                                <a href="{{ route('supervisor.edit', $supervisor->id) }}"
                                                   class="link-primary text-decoration-none">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                         height="24" viewBox="0 0 24 24" stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                                </a>
                                            </td>
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
                            {{ $supervisors->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
