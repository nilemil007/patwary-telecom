@extends('layouts.app')
@push('title') All Rso @endpush

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
                        All Rso
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <!-- Create new entry [Full Button]-->
                        @if( \Illuminate\Support\Facades\Auth::user()->role == 'super-admin' && \App\Models\ItopReplace::where('remarks','Unapproved')->count() > 0 )
                            <button type="button" class="btn btn-danger d-none d-sm-inline-block">
                            Unapproved ({{ \App\Models\ItopReplace::where('remarks','Unapproved')->count() }})
                            </button>
                        @elseif( \Illuminate\Support\Facades\Auth::user()->role != 'super-admin' && \App\Models\ItopReplace::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('remarks','Unapproved')->count() > 0 )
                            <button type="button" class="btn btn-danger d-none d-sm-inline-block">
                                Unapproved ({{ \App\Models\ItopReplace::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('remarks','Unapproved')->count() }})
                            </button>
                        @endif

                        <!-- [Full Button]-->
{{--                        <a href="{{ route('rso.create') }}" class="btn btn-primary d-none d-sm-inline-block">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>--}}
{{--                            Create new replace--}}
{{--                        </a>--}}

                        <!-- [Icon Button]-->
{{--                        <a href="{{ route('rso.create') }}" class="btn btn-primary d-sm-none btn-icon">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>--}}
{{--                        </a>--}}
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
                                    <th>Name</th>
                                    <th>Itop/Pool Number</th>
                                    <th>Personal Number</th>
                                    <th>RID</th>
                                    <th>Father/Mother Name</th>
                                    <th>Thana/District</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $rsos as $sl => $rso )
{{--                                    @canany(['viewAny','view'], $replace)--}}
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2" style="background-image: url({{ $rso->user->image }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $rso->user->name }}</div>
                                                    <div class="text-muted">
                                                        <a href="#" class="text-reset">{{ $rso->code }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $rso->itop_number }}</div>
                                            <div class="text-muted">{{ $rso->pool_number }}</div>
                                        </td>
                                        <td>{{ $rso->personal_number }}</td>
                                        <td data-label="Title">
                                            <div>{{ $rso->rid }}</div>
                                            <div class="text-muted">{{ $rso->sr_no }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $rso->father_name }}</div>
                                            <div class="text-muted">{{ $rso->mother_name }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $rso->thana }}</div>
                                            <div class="text-muted">{{ $rso->district }}</div>
                                        </td>
                                        <td title="{{ $rso->address }}">{{ \Illuminate\Support\Str::words($rso->address,5) }}</td>


                                        <td>
                                            @switch( $rso->status )
                                                @case( 1 )
                                                <span class="badge bg-success me-1"></span> Active
                                                @break

                                                @case( 2 )
                                                <span class="badge bg-danger me-1"></span> Inactive
                                                @break
                                            @endswitch
                                        </td>
{{--                                        <td>--}}
{{--                                            @if( $rso->remarks )--}}
{{--                                                <button class="btn btn-sm btn-pill {{ \Illuminate\Support\Facades\Auth::user()->role != 'super-admin' ? 'disabled' : '' }}" data-bs-toggle="modal"--}}
{{--                                                        data-bs-target="@if(\Illuminate\Support\Facades\Auth::user()->role == 'super-admin') #approve-reject-{{ $replace->id }} @endif">--}}
{{--                                                    <span class="badge bg-danger me-1"></span> {{ $replace->remarks }}--}}
{{--                                                </button>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div>{{ $replace->created_at->diffForHumans() }}</div>--}}
{{--                                            <div class="text-muted">{{ $replace->created_at->toDayDateTimeString() }}</div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div>{{ isset($replace->payment_at)?$replace->payment_at->diffForHumans():'' }}</div>--}}
{{--                                            <div class="text-muted">{{ isset($replace->payment_at)?$replace->payment_at->toDayDateTimeString():'' }}</div>--}}

{{--                                        </td>--}}
                                        <td>
                                            <!-- Edit -->
                                            <a href="{{ \Illuminate\Support\Facades\Auth::id() == $rso->user_id && $rso->remarks ? '#' : route('rso.edit', $rso->id) }}"
                                               class="link-primary text-decoration-none {{ \Illuminate\Support\Facades\Auth::id() == $rso->user_id && $rso->remarks ? 'disabled' : route('rso.edit', $rso->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
{{--                                            @can('Replace delete')--}}
                                                <a href="#" class="link-danger text-decoration-none"
                                                   data-bs-toggle="modal" data-bs-target="#del-replace-{{ $rso->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </a>
{{--                                            @endcan--}}
                                        </td>
                                        @include('rso.modals.delete')
{{--                                        @include('rso.modals.approve')--}}
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
                            {{ $rsos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @can('Replace export')
                        @if( count($rsos) > 0 )
                            <div class="mt-3">
                                <a class="btn btn-sm btn-success" href="{{ route('rso.export') }}">Export Excel</a>
                            </div>
                        @endif
                    @endcan

                </div>
            </div>
        </div>
    </div>
@endsection
