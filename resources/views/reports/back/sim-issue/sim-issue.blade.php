<x-main>

    <!-- Main Title -->
    <x-slot:title>Sim Issue</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>
        Sim Issue
    </x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.sim.issue.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_sim_issue" type="file"
                       accept=".xls,.xlsx"
                       class="form-control" required>

                <x-button class="btn-outline-google">
                    <x-icon.file-import></x-icon.file-import>Import
                </x-button>
            </div>
        </form>
    </x-slot:button>


    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                    <th>product name|code</th>
                                    <th>selling price</th>
                                    <th>sim serial</th>
                                    <th>issue date</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $simIssues as $sl => $simIssue )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $simIssue->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $simIssue->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $simIssue->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $simIssue->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $simIssue->rso->user->name }}</div>
                                            <div class="text-muted">{{ $simIssue->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $simIssue->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $simIssue->retailer->retailer_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $simIssue->product_name }}</div>
                                            <div class="text-muted">{{ $simIssue->product_code }}</div>
                                        </td>
                                        <td>{{ $simIssue->selling_price }}</td>
                                        <td>{{ $simIssue->sim_serial }}</td>
                                        <td>{{ $simIssue->issue_date->toFormattedDateString() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No sim issue data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $simIssues->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        @if( $simIssues->count() > 1 )
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete_all_sim_issue">Delete All</button>
                            @include('reports.back.sim-issue.modals.delete-all')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
