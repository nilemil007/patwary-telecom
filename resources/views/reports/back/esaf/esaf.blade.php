<x-main>

    <!-- Main Title -->
    <x-slot:title>Esaf</x-slot:title>

    <!-- Page Pre Title -->
    <x-slot:page-pre-title>Overview</x-slot:page-pre-title>

    <!-- Page Title -->
    <x-slot:page-title>Esaf</x-slot:page-title>

    <!-- Page title actions -->
    <x-slot:button>
        <!-- [Full Button]-->
        <form action="{{ route('raw.esaf.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="import_esaf" type="file"
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
                                    <th>customer name|number</th>
                                    <th>alter number</th>
                                    <th>email</th>
                                    <th>gender</th>
                                    <th>reason</th>
                                    <th>address</th>
                                    <th>status</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse( $esafs as $sl => $esaf )
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select invoice">
                                        </td>
                                        <td><span class="text-muted">{{ ++$sl }}</span></td>
                                        <td data-label="Title">
                                            <div>{{ $esaf->ddHouse->name }}</div>
                                            <div class="text-muted">{{ $esaf->ddHouse->code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $esaf->supervisor->user->name }}</div>
                                            <div class="text-muted">{{ $esaf->supervisor->pool_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $esaf->rso->user->name }}</div>
                                            <div class="text-muted">{{ $esaf->rso->itop_number }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $esaf->retailer->retailer_name }}</div>
                                            <div class="text-muted">{{ $esaf->retailer->retailer_code }}</div>
                                        </td>
                                        <td data-label="Title">
                                            <div>{{ $esaf->customer_name }}</div>
                                            <div class="text-muted">{{ $esaf->customer_number }}</div>
                                        </td>
                                        <td>{{ $esaf->alternate_number }}</td>
                                        <td>{{ $esaf->email }}</td>
                                        <td>{{ $esaf->gender }}</td>
                                        <td>{{ $esaf->reason }}</td>
                                        <td>{{ $esaf->address }}</td>
                                        <td>{{ $esaf->status }}</td>
                                        <td>{{ $esaf->date->toFormattedDateString() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No esaf data found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer d-flex align-items-center">
                            {{ $esafs->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                    @if( auth()->user()->role == 'super-admin' )
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            @if( $esafs->count() > 1 )
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_all_esaf">Delete All</button>
                                @include('reports.back.esaf.modals.delete-all')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main>
