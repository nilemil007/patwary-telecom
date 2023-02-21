<x-main>

    <!-- Main Title -->
    <x-slot:title>Retailer List</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Retailer List</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('retailer.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_retailers" type="file"
                       accept=".xls,.xlsx"
                       aria-describedby="inputGroupFileAddon04"
                       class="form-control form-control-sm"
                       aria-label="Upload" required>

                <button class="btn btn-sm btn-outline-google" type="submit">
                    <x-icon.file-import></x-icon.file-import>Import Retailers
                </button>
            </div>
        </form>
    </x-slot:button>

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
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $retailers as $sl => $retailer )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                      style="background-image: url({{ $retailer->image }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">{{ $retailer->owner_name }}</div>
                                                    <div class="text-muted">
                                                        {{ $retailer->retailer_code }}
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
                                        <td>
                                            @switch( $retailer->status )
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
                                            <!-- Edit -->
                                            <a href="{{ route('retailer.edit', $retailer->id) }}"
                                               class="link-primary text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                                            </a>

                                            <!-- Delete -->
                                            <a href="#" class="link-danger text-decoration-none"
                                               data-bs-toggle="modal" data-bs-target="#del-replace-{{ $retailer->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
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
                            {{ $retailers->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

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
                </div>
            </div>
        </div>
    </div>

</x-main>
