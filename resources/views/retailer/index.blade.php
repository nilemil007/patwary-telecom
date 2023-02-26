<x-main>

    <!-- Main Title -->
    <x-slot:title>Retailer List</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Retailer List</x-slot:page-title>

    <!-- Page title actions -->
    @if( auth()->user()->role == 'super-admin' )
        <x-slot:button>
            <!-- [Full Button]-->
            <form action="{{ route('retailer.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input name="import_retailers" type="file"
                           accept=".xls,.xlsx"
                           aria-describedby="inputGroupFileAddon04"
                           class="form-control"
                           aria-label="Upload" required>

                    <button class="btn btn-outline-google" type="submit">
                        <x-icon.file-import></x-icon.file-import>Import Retailers
                    </button>
                </div>
            </form>
        </x-slot:button>
    @endif

    <x-slot:icon-button>
        <x-icon.file-import></x-icon.file-import>
{{--        <form action="{{ route('retailer.import') }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="input-group">--}}
{{--                <input name="import_retailers" type="file"--}}
{{--                       accept=".xls,.xlsx"--}}
{{--                       aria-describedby="inputGroupFileAddon04"--}}
{{--                       class="form-control form-control-sm"--}}
{{--                       aria-label="Upload" required>--}}

{{--                <button class="btn btn-sm btn-outline-google" type="submit">--}}
{{--                    <x-icon.file-import></x-icon.file-import>Import Retailers--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </x-slot:icon-button>


    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
{{--                                <div class="text-muted">--}}
{{--                                    Show--}}
{{--                                    <div class="mx-2 d-inline-block">--}}
{{--                                        <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">--}}
{{--                                    </div>--}}
{{--                                    entries--}}
{{--                                </div>--}}
                                <div class="ms-auto text-muted">
                                    <div class="d-inline-block">
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
                                    <th>Personal Number</th>
                                    <th>Itop/RS0 Number</th>
                                    <th>DD House</th>
                                    <th>Enabled</th>
                                    <th>SSO</th>
                                    <th>Service Point</th>
                                    <th>Thana</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $retailers as $sl => $retailer )
                                    <tr {{ $retailer->status ? 'class=bg-danger-lt' : '' }}>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                      style="background-image: url({{ $retailer->user->image ?? '' !== null }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $retailer->retailer_name }}</div>
                                                    <div class="text-muted">
                                                        {{ $retailer->itop_number }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $retailer->contact_no }}</td>
                                        <td data-label="Title">
                                            <div>{{ $retailer->itop_number }}</div>
                                            <div class="text-muted">{{ $retailer->rso_number }}</div>
                                        </td>
                                        <td>{{ $retailer->ddHouse->name }}</td>
                                        <td>{{ $retailer->enabled }}</td>
                                        <td>{{ $retailer->sim_seller }}</td>
                                        <td>{{ $retailer->service_point }}</td>
                                        <td>{{ $retailer->thana }}</td>
                                        <td>{{ $retailer->password }}</td>
                                        <td>
                                            @if( $retailer->status && auth()->user()->role == 'super-admin' )
                                                <a href="{{ route('retailer.verify', $retailer->id) }}" class="btn btn-sm btn-pill">
                                                    <span class="badge bg-danger me-1"></span>Verify
                                                </a>
                                            @elseif( $retailer->status )
                                                <span class="badge bg-danger me-1"></span>Pending
                                            @endif
                                        </td>

                                        <td>
                                            <!-- View -->
                                            <x-link href="{{ route('retailer.show', $retailer->id) }}" class="link-warning">
                                                <x-icon.eye></x-icon.eye>
                                            </x-link>

                                            <!-- Edit -->
                                            <x-link href="{{ route('retailer.edit', $retailer->id) }}">
                                                <x-icon.edit></x-icon.edit>
                                            </x-link>

                                            <!-- Delete -->

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
                            {{ $retailers->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( count( $retailers ) > 0 )
                                <div>
                                    <a class="btn btn-sm btn-success" href="{{ route('retailer.export') }}">Export Excel</a>

                                    @if( count( $retailers ) > 1 )
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete_all_routes">Delete All</button>
                                        @include('route.modals.delete-all')
                                    @endif
                                </div>
                            @endif

                            <x-link class="nav-link" href="{{ route('download.retailer.sample.file') }}">Sample file download</x-link>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-main>
