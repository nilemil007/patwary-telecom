@extends('layouts.app')
@push('title') Itop Replace @endpush

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
                        Itop Replace
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <!-- [Full Button]-->
                        <a href="{{ route('itop-replace.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Create new replace
                        </a>

                        <!-- [Icon Button]-->
                        <a href="{{ route('itop-replace.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                    <div class="card">
                        <form>
                            <div class="card-header d-flex justify-content-center">
                                <div class="form-group row me-5">
                                    <label class="form-label col-5 col-form-label-sm mb-0">Start Date</label>
                                    <div class="col">
                                        <input name="start_date"
                                               value="{{ request()->get('start_date') }}"
                                               type="date" class="form-control form-control-sm"
                                               placeholder="Select a date">
                                    </div>
                                </div>

                                <div class="form-group row me-2">
                                    <label class="form-label col-5 col-form-label-sm mb-0">End Date</label>
                                    <div class="col">
                                        <input name="end_date"
                                               value="{{ request()->get('end_date') }}"
                                               type="date" class="form-control form-control-sm" placeholder="Select a date">
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </form>

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
                                    <th>Itop Number</th>
                                    <th>Reason</th>
                                    <th>Balance</th>
                                    <th>Pay Amount</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Requested</th>
                                    <th>Payment Date</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $replaces as $sl => $replace )
                                    @canany(['viewAny','view'], $replace)
                                    <tr {{ $replace->remarks ? 'class=bg-danger-lt' : '' }}>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2" style="background-image: url({{ $replace->user->image }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $replace->user->name }}</div>
                                                    <div class="text-muted">
                                                        <a href="#" class="text-reset">{{ $replace->user->role }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $replace->itop_number }}</div>
                                            <div class="text-muted">{{ $replace->serial_number }}</div>
                                        </td>
                                        <td>{{ $replace->reason }}</td>
                                        <td>{{ $replace->balance }}</td>
                                        <td>{{ $replace->pay_amount }}</td>
                                        <td>
                                            @switch( $replace->status )
                                                @case( 'pending' )
                                                <span class="badge bg-warning-lt me-1"></span> Pending
                                                @break

                                                @case( 'processing' )
                                                <span class="badge bg-warning me-1"></span> Processing
                                                @break

                                                @case( 'complete' )
                                                <span class="badge bg-blue me-1"></span> Complete
                                                @break

                                                @case( 'due' )
                                                <span class="badge bg-danger me-1"></span> Due
                                                @break

                                                @case( 'paid' )
                                                <span class="badge bg-success me-1"></span> Paid
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if( $replace->remarks )
                                                <button class="btn btn-sm btn-pill {{ \Illuminate\Support\Facades\Auth::user()->role != 'super-admin' ? 'disabled' : '' }}" data-bs-toggle="modal"
                                                        data-bs-target="@if(\Illuminate\Support\Facades\Auth::user()->role == 'super-admin') #approve-reject-{{ $replace->id }} @endif">
                                                    <span class="badge bg-danger me-1"></span> {{ $replace->remarks }}
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div>{{ $replace->created_at->diffForHumans() }}</div>
                                            <div class="text-muted">{{ $replace->created_at->toDayDateTimeString() }}</div>
                                        </td>
                                        <td>
                                            <div>{{ isset($replace->payment_at)?$replace->payment_at->diffForHumans():'' }}</div>
                                            <div class="text-muted">{{ isset($replace->payment_at)?$replace->payment_at->toDayDateTimeString():'' }}</div>

                                        </td>
                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ \Illuminate\Support\Facades\Auth::id() == $replace->user_id && $replace->remarks ? '#' : route('itop-replace.edit', $replace->id) }}"
                                               class="link-primary text-decoration-none {{ \Illuminate\Support\Facades\Auth::id() == $replace->user_id && $replace->remarks ? 'disabled' : route('itop-replace.edit', $replace->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
                                            @can('super-admin')
                                                <a href="#" class="link-danger text-decoration-none"
                                                   data-bs-toggle="modal" data-bs-target="#del-replace-{{ $replace->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </a>
                                            @endcan
                                        </td>
                                        @include('itop-replace.modals.delete')
                                        @include('itop-replace.modals.approve')
                                    </tr>
                                    @endcanany
                                @empty
                                    <tr>
                                        <td>No data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $replaces->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @can('Replace export')
                        @if( count($replaces) > 0 )
                            <div class="mt-3">
                                <a class="btn btn-sm btn-success" href="{{ route('itop-replace.export') }}">Export Excel</a>
                            </div>
                        @endif
                    @endcan

                </div>
            </div>
        </div>
    </div>
@endsection
