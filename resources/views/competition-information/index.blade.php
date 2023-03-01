<x-main>

    <!-- Main Title -->
    <x-slot:title>Other's Operator Info</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Other's Operator Information</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <x-link href="{{ route('others-operator-information.create') }}" class="btn btn-primary {{ auth()->user()->role != 'rso' ? 'd-none' : '' }}">
            <x-icon.plus></x-icon.plus>Create new entry
        </x-link>
    </x-slot:button>

    <x-slot:icon-button>
        <!-- [Icon Button]-->
        <x-link href="{{ route('others-operator-information.create') }}" class="btn btn-primary btn-icon">
            <x-icon.plus></x-icon.plus>
        </x-link>
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
                                    <th>rso | House</th>
                                    <th>retailer number | code</th>
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
                                @forelse( $ooi as $sl => $data )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $data->rso_number }}</div>
                                            <div class="text-muted">{{ $data->dd_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $data->retailer_number }}</div>
                                            <div class="text-muted">{{ $data->retailer_code }}</div>
                                        </td>
                                        <td>{{ $data->bl_tarshiary }}</td>
                                        <td>{{ $data->gp_tarshiary }}</td>
                                        <td>{{ $data->robi_tarshiary }}</td>
                                        <td>{{ $data->airtel_tarshiary }}</td>
                                        <td>{{ $data->bl_ga }}</td>
                                        <td>{{ $data->gp_ga }}</td>
                                        <td>{{ $data->robi_ga }}</td>
                                        <td>{{ $data->airtel_ga }}</td>
                                        <td>
                                            <div>{{ $data->created_at->diffForHumans() }}</div>
                                            <div class="text-muted">{{ $data->created_at->toDayDateTimeString() }}</div>
                                        </td>
                                        <td>
                                            <div>{{ $data->updated_at->diffForHumans() }}</div>
                                            <div class="text-muted">{{ $data->updated_at->toDayDateTimeString() }}</div>
                                        </td>
                                        <td>
                                            <!-- Edit -->
                                            <x-link href="{{ route('others-operator-information.edit', $data->id) }}" class="link-primary">
                                                <x-icon.edit></x-icon.edit>
                                            </x-link>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No data found</td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $ooi->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    <div class="mt-3">
                        @if( count( $ooi ) > 0 && auth()->user()->role == 'super-admin' || auth()->user()->role == 'zm' )
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-sm btn-success" href="{{ route('ooi.info.export') }}">Export Excel</a>

                                @if( count( $ooi ) > 1 && auth()->user()->role == 'super-admin' )
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete_all_ooi_info">Delete All</button>
                                    @include('competition-information.modals.delete-all')
                                @endif
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-main>
