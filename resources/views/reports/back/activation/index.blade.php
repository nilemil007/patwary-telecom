<x-main>

    <!-- Main Title -->
    <x-slot:title>Activation</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Activation</x-slot:page-title>

    <!-- Page title actions -->
    @if( auth()->user()->role == 'super-admin' )
        <x-slot:button>
            <!-- [Full Button]-->
            <form action="{{ route('activation.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input name="import_activation" type="file"
                           accept=".xls,.xlsx"
                           class="form-control" required>

                    <button class="btn btn-outline-google" type="submit">
                        <x-icon.file-import></x-icon.file-import>Import Activation
                    </button>
                </div>
            </form>
        </x-slot:button>
    @endif

    <x-slot:icon-button>
        <x-icon.file-import></x-icon.file-import>
{{--        <form action="{{ route('activation.import') }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="input-group">--}}
{{--                <input name="import_activation" type="file"--}}
{{--                       accept=".xls,.xlsx"--}}
{{--                       aria-describedby="inputGroupFileAddon04"--}}
{{--                       class="form-control"--}}
{{--                       aria-label="Upload" required>--}}

{{--                <button class="btn btn-outline-google" type="submit">--}}
{{--                    <x-icon.file-import></x-icon.file-import>Import Activation--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </x-slot:icon-button>


    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
{{--                        <form>--}}
{{--                            <div class="card-header d-flex justify-content-center">--}}
{{--                                <div class="form-group row me-5">--}}
{{--                                    <label class="form-label col-5 col-form-label-sm mb-0">Start Date</label>--}}
{{--                                    <div class="col">--}}
{{--                                        <input name="start_date"--}}
{{--                                               value="{{ request()->get('start_date') }}"--}}
{{--                                               type="date" class="form-control form-control-sm"--}}
{{--                                               placeholder="Select a date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row me-2">--}}
{{--                                    <label class="form-label col-5 col-form-label-sm mb-0">End Date</label>--}}
{{--                                    <div class="col">--}}
{{--                                        <input name="end_date"--}}
{{--                                               value="{{ request()->get('end_date') }}"--}}
{{--                                               type="date" class="form-control form-control-sm" placeholder="Select a date">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <button type="submit" class="btn btn-sm btn-outline-primary">Search</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}

                        <div class="card-body border-bottom py-3">
                            <form method="GET">
                                {{--                                            <div class="card-header d-flex justify-content-center">--}}
                                {{--                                                <div class="form-group row me-5">--}}
                                {{--                                                    <label class="form-label col-5 col-form-label-sm mb-0">Start Date</label>--}}
                                {{--                                                    <div class="col">--}}
                                {{--                                                        <input name="start_date"--}}
                                {{--                                                               value="{{ request()->get('start_date') }}"--}}
                                {{--                                                               type="date" class="form-control form-control-sm"--}}
                                {{--                                                               placeholder="Select a date">--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}

                                {{--                                                <div class="form-group row me-2">--}}
                                {{--                                                    <label class="form-label col-5 col-form-label-sm mb-0">End Date</label>--}}
                                {{--                                                    <div class="col">--}}
                                {{--                                                        <input name="end_date"--}}
                                {{--                                                               value="{{ request()->get('end_date') }}"--}}
                                {{--                                                               type="date" class="form-control form-control-sm" placeholder="Select a date">--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}

                                {{--                                                <div>--}}
                                {{--                                                    <button type="submit" class="btn btn-sm btn-outline-primary">Search</button>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}

                                <div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text">Start Date</span>
                                        <input type="date" class="form-control">
                                    </div>

                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text">End Date</span>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <x-input name="search" value="{{ request()->get('search') }}" class="form-control-sm" placeholder="Type something..."></x-input>
                                    <x-button class="btn-sm">
                                        <x-icon.search></x-icon.search>Search
                                    </x-button>
                                </div>
                            </form>
{{--                            <div class="d-flex">--}}
{{--                                <div class="ms-auto text-muted">--}}
{{--                                    <div class="d-inline-block">--}}
{{--                                        --}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
                                    <th>dd</th>
                                    <th>supervisor</th>
                                    <th>rso</th>
                                    <th>retailer</th>
                                    <th>product code | name</th>
                                    <th>msisdn | sim serial</th>
                                    <th>selling price</th>
                                    <th>activation date</th>
                                    <th>bio date</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $activations as $sl => $activation )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $activation->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $activation->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $activation->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->rso->user->name }}</div>
                                            <div class="text-muted">{{ $activation->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $activation->retailer->retailer_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->product_name }}</div>
                                            <div class="text-muted">{{ $activation->product_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $activation->msisdn }}</div>
                                            <div class="text-muted">{{ $activation->sim_serial }}</div>
                                        </td>
                                        <td>{{ $activation->selling_price }}</td>
                                        <td>{{ $activation->activation_date->toFormattedDateString() }}</td>
                                        <td>{{ $activation->bio_date->toFormattedDateString() }}</td>

{{--                                        <td>--}}
{{--                                            <!-- View -->--}}
{{--                                            <x-link href="{{ route('retailer.show', $retailer->id) }}" class="link-warning">--}}
{{--                                                <x-icon.eye></x-icon.eye>--}}
{{--                                            </x-link>--}}

{{--                                            <!-- Edit -->--}}
{{--                                            <x-link href="{{ route('retailer.edit', $retailer->id) }}">--}}
{{--                                                <x-icon.edit></x-icon.edit>--}}
{{--                                            </x-link>--}}

{{--                                            <!-- Delete -->--}}

{{--                                        </td>--}}
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
                            {{ $activations->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

{{--                    @if( auth()->user()->role == 'super-admin' )--}}
{{--                        <div class="mt-3 d-flex justify-content-between align-items-center">--}}
{{--                            @if( count( $retailers ) > 0 )--}}
{{--                                <div>--}}
{{--                                    <a class="btn btn-sm btn-success" href="{{ route('retailer.export') }}">Export Excel</a>--}}

{{--                                    @if( count( $retailers ) > 1 )--}}
{{--                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#delete_all_routes">Delete All</button>--}}
{{--                                        @include('route.modals.delete-all')--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                            <x-link class="nav-link" href="{{ route('download.retailer.sample.file') }}">Sample file download</x-link>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>

</x-main>
