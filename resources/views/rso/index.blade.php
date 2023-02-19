<x-main>
    <!-- Main Title -->
    <x-slot:title>Rso</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Rso</x-slot:page-title>

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
                                    <div class="ms-2 d-inline-block">
                                        <form method="GET">
                                            <div class="input-group mb-3">
                                                <x-input name="search" value="{{ request()->get('search') }}" class="form-control-sm" placeholder="Type something..."></x-input>
                                                <x-button class="btn-sm">
                                                    <x-icon.search></x-icon.search>Search
                                                </x-button>
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
                                    <th>Itop/Pool Number</th>
                                    <th>Personal Number</th>
                                    <th>RID</th>
                                    <th>Supervisor</th>
                                    <th>Routes</th>
                                    <th>Father/Mother Name</th>
                                    <th>Thana/District</th>
                                    <th>Address</th>
                                    <th>document</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $rsos as $sl => $rso )
                                    <tr {{ $rso->status ? 'class=bg-danger-lt' : '' }}>
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
                                            <div>{{ $rso->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $rso->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            @if( !empty( $rso->routes ) )
                                                @foreach( $rso->routes as $id )
                                                    @if(\App\Models\Route::firstWhere('id', $id) !== null)
                                                        <div>{{ \App\Models\Route::firstWhere('id', $id)->code .' - '.\App\Models\Route::firstWhere('id', $id)->name }}</div>
                                                    @endif
                                                @endforeach
                                            @endif
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
                                            @if( $rso->document )
                                                <x-link href="{{ route('download.rso.document', $rso->id) }}">
                                                    Download
                                                </x-link>
                                            @endif
                                        </td>
                                        <td>
                                            @if( $rso->status )
                                                <a href="{{ route('rso.verify', $rso->id) }}" class="btn btn-sm btn-pill">
                                                    <span class="badge bg-danger me-1"></span>Verify
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            <!-- Edit -->
                                            <x-link href="{{ route('rso.edit', $rso->id) }}" class="link-primary">
                                                <x-icon.edit></x-icon.edit>
                                            </x-link>
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
                            {{ $rsos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( count( $rsos ) > 0 )
                        <div class="mt-3">
                            <a class="btn btn-sm btn-success" href="{{ route('rso.export') }}">Export Excel</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
