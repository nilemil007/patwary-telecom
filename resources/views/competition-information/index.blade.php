@extends('layouts.app')
@push('title') <title>Competition Information | {{ config('app.name') }}</title> @endpush

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
                        Competition Information
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- [Full Button]-->
                        @if(\Illuminate\Support\Facades\Auth::user()->role != 'super-admin')
                            <a href="{{ route('competition.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Competition Information
                            </a>

                            <!-- [Icon Button]-->
                            <a href="{{ route('competition.create') }}" class="btn btn-primary d-sm-none btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            </a>
                        @endif
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
{{--                            <div class="card-header">--}}
                                <form class="row row-cols-lg-auto justify-content-center align-items-end p-3">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Start Date</label>
                                            <input name="start_date"
                                                   value="{{ request()->get('start_date') }}"
                                                   type="date" class="form-control form-control-sm"
                                                   placeholder="Select a date">
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">End Date</label>
                                            <input name="end_date"
                                                   value="{{ request()->get('end_date') }}"
                                                   type="date" class="form-control form-control-sm" placeholder="Select a date">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <button type="submit" class="btn btn-sm btn-primary w-100 d-md-none">
                                            Search
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-primary d-none d-md-block">
                                            Search
                                        </button>
                                    </div>
                                </form>
                                <hr class="m-0">
{{--                            </div>--}}

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
                                    <th>cluster | region</th>
                                    <th>dd | retailer code</th>
                                    <th>rso | retailer number</th>
                                    <th>bl c2s</th>
                                    <th>gp c2s</th>
                                    <th>robi c2s</th>
                                    <th>airtel c2s</th>
                                    <th>bl ga</th>
                                    <th>gp ga</th>
                                    <th>robi ga</th>
                                    <th>airtel ga</th>
                                    <th>created at</th>
                                    <th>last update</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $competitions as $sl => $competition )
{{--                                    @canany(['viewAny','view'], $replace)--}}
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $competition->cluster }}</div>
                                            <div class="text-muted">{{ $competition->region }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $competition->dd_code }}</div>
                                            <div class="text-muted">{{ $competition->retailer_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $competition->rso_number }}</div>
                                            <div class="text-muted">{{ $competition->retailer_number }}</div>
                                        </td>
                                        <td>{{ $competition->bl_c2s }}</td>
                                        <td>{{ $competition->gp_c2s }}</td>
                                        <td>{{ $competition->robi_c2s }}</td>
                                        <td>{{ $competition->airtel_c2s }}</td>
                                        <td>{{ $competition->bl_ga }}</td>
                                        <td>{{ $competition->gp_ga }}</td>
                                        <td>{{ $competition->robi_ga }}</td>
                                        <td>{{ $competition->airtel_ga }}</td>
                                        <td>
                                            <div>{{ $competition->created_at->diffForHumans() }}</div>
                                            <div class="text-muted">{{ $competition->created_at->toDayDateTimeString() }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $competition->updated_at->diffForHumans() }}</div>
                                            <div class="text-muted">{{ $competition->updated_at->toDayDateTimeString() }}</div>
                                        </td>
                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ route('competition.edit', $competition->id) }}"
                                               class="link-primary text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
                                            @can('delete competition')
                                                <a href="#" class="link-danger text-decoration-none"
                                                   data-bs-toggle="modal" data-bs-target="#del-competition-{{ $competition->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </a>
                                            @endcan
                                        </td>
                                        @include('competition-information.modals.delete')
                                    </tr>
{{--                                    @endcanany--}}
                                @empty
                                    <tr>
                                        <td>No data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $competitions->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @can('export replace')
                        @if( count($competitions) > 0 )
                            <div class="mt-3">
                                <a class="btn btn-sm btn-success" href="{{ route('competition.information.export') }}">Export Excel</a>
                            </div>
                        @endif
                    @endcan

                </div>
            </div>
        </div>
    </div>
@endsection
