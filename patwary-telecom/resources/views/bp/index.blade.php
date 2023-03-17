<x-main>
    <!-- Main Title -->
    <x-slot:title>BP</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>BP</x-slot:page-title>


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
                                    <th>dd house</th>
                                    <th>Supervisor</th>
                                    <th>Stuff ID</th>
                                    <th>personal number</th>
                                    <th>father/mother name</th>
                                    <th>education</th>
                                    <th>division</th>
                                    <th>district/thana</th>
                                    <th>address</th>
                                    <th>nid/dob</th>
                                    <th>bank/brunch name</th>
                                    <th>salary/account number</th>
                                    <th>blood group</th>
                                    <th>joining/resign date</th>
                                    <th>document</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $bps as $sl => $bp )
                                    <tr {{ $bp->status ? 'class=bg-danger-lt' : '' }}>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <a href="{{ route('bp.edit', $bp->id) }}"
                                                   class="text-decoration-none">
                                                    <span class="avatar me-2"
                                                  style="background-image: url({{ $bp->user->image }})">
                                                    </span>
                                                </a>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $bp->user->name }}</div>
                                                    <div class="text-muted">
                                                        {{ $bp->pool_number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $bp->ddHouse->code }}</td>
                                        <td data-label="Title">
                                            <div>{{ $bp->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $bp->supervisor->pool_number }}</div>
                                        </td>
                                        <td>{{ $bp->stuff_id }}</td>
                                        <td>{{ $bp->personal_number }}</td>
                                        <td data-label="Title">
                                            <div>{{ $bp->father_name }}</div>
                                            <div class="text-muted">{{ $bp->mother_name }}</div>
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::upper($bp->education) }}</td>
                                        <td>{{ $bp->division }}</td>
                                        <td data-label="Title">
                                            <div>{{ $bp->district }}</div>
                                            <div class="text-muted">{{ $bp->thana }}</div>
                                        </td>
                                        <td title="{{ $bp->address }}">
                                            {{ \Illuminate\Support\Str::words($bp->address, 4) }}
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bp->nid }}</div>
                                            <div class="text-muted">{{ !empty($bp->dob)?$bp->dob->toFormattedDateString():'' }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bp->bank_name }}</div>
                                            <div class="text-muted">{{ $bp->brunch_name }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $bp->salary }}</div>
                                            <div class="text-muted">{{ $bp->account_number }}</div>
                                        </td>
                                        <td>{{ $bp->blood_group }}</td>
                                        <td data-label="Title">
                                            <div title="Joining Date">
                                                {{ !empty($bp->joining_date)?$bp->joining_date->toDayDateTimeString():'' }}
                                            </div>
                                            <div title="Resign Date" class="text-muted">
                                                {{ !empty($bp->resigning_date)?$bp->resigning_date->toDayDateTimeString():'' }}
                                            </div>
                                        </td>
                                        <td>
                                            @if( $bp->document )
                                                <x-link href="{{ route('download.bp.document', $bp->id) }}">
                                                    Download
                                                </x-link>
                                            @endif
                                        </td>
                                        <td>
                                            @if( $bp->status )
                                                <a href="{{ route('bp.verify', $bp->id) }}" class="btn btn-sm btn-pill">
                                                    <span class="badge bg-danger me-1"></span>Verify
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit -->
                                            <x-link href="{{ route('bp.edit', $bp->id) }}" class="link-primary">
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
                            {{ $bps->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( count( $bps ) > 0 )
                        <div class="mt-3">
                            <a class="btn btn-sm btn-success" href="{{ route('bp.export') }}">
                                Export Excel
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
